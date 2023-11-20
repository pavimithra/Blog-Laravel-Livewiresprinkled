<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Image;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::where('parent_id', null)->pluck('name', 'id');
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $post = Post::create($request->validated());

        $images = [];
        if($request->hasfile('images')){
            foreach($request->file('images') as $image) {
                $images[]['name'] = $image->store('images/posts', 'public');
            }
        }

        $post->categories()->attach($request->categories);
        $post->images()->createMany($images);

        return redirect(route('admin.posts.edit',$post))->with('status', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        $category_ids = [];
        foreach ($post->categories as $category) {
            $category_ids[] = $category->id;
        }
        $categories = Category::where('parent_id', null)->pluck('name', 'id');
        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories, 'category_ids' => $category_ids]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $validated = $request->validated();

        if($request->has('action')) {
            if ($request->input('action') == 'send_for_approval')
                $validated['status'] = 'sent_for_approval';
            elseif ($request->input('action') == 'approve') 
                $validated['status'] = 'approved';
        }
        
        $post->update($validated);
        $post->categories()->sync($request->categories);

        return redirect(route('admin.posts.index'))->with('status', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
 
        return back()->with('status', 'Post Deleted Successfully');
    }
}

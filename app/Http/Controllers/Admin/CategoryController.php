<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::where('parent_id', null)->pluck('name', 'id');
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        
        if($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images/category', 'public');
        }

        Category::create($validated);

        return redirect(route('admin.categories.index'))->with('status', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view('admin.categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        $categories = Category::where([ 
            ['parent_id', null], ['id', '!=', $category->id], 
            ])->pluck('name', 'id');
        return view('admin.categories.edit', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $validated = $request->validated();
                
        if($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images/category', 'public');
            if($category->image) {
                Storage::disk('public')->delete($category->image);
            }
        }
        $category->update($validated);

        return redirect(route('admin.categories.index'))->with('status', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
 
        return back()->with('status', 'Category Deleted Successfully');
    }
}

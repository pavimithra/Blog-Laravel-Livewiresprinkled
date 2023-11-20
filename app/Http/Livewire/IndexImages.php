<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;

class IndexImages extends Component
{
    use WithFileUploads;

    public $post;
    
    public $post_images = [];

    public $iteration = 1;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function delete($imageId)
    {
        Image::destroy($imageId);
    }

    public function make_featured($imageId)
    {
        Image::where('is_featured', 1)->where('post_id', $this->post->id)
            ->update(['is_featured' => 0]);

        $image = Image::find($imageId);
 
        $image->is_featured = 1;
        
        $image->save();
    }

    public function save()
    {
        $this->validate([
            'post_images.*' => 'image',
            'post_images' => 'required',
        ]);

        $post_img = [];
        foreach($this->post_images as $image) {
            $post_img[]['name'] = $image->store('images/posts', 'public');
        }
  
        $this->post->images()->createMany($post_img);

        $this->post_images=null;
        $this->iteration++;
    }

    public function updatingSave()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.index-images', [
            'images' => Image::where('post_id', '=', $this->post->id)->get(),
        ]);
    }
}

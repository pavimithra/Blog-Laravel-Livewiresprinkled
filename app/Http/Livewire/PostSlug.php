<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class PostSlug extends Component
{
    public $slug;

    public $title;

    public function mount($title, $slug)
    {
        $this->title = $title;
        $this->slug = $slug;
    }

    public function updatedTitle($title)
    {
        $this->slug = Str::of($title)->slug('-');
    }

    public function render()
    {
        return view('livewire.post-slug');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class CategorySlug extends Component
{
    public $slug;

    public $name;

    public function mount($name, $slug)
    {
        $this->name = $name;
        $this->slug = $slug;
    }

    public function updatedName($name)
    {
        $this->slug = Str::of($name)->slug('-');
    }

    public function render()
    {
        return view('livewire.category-slug');
    }
}

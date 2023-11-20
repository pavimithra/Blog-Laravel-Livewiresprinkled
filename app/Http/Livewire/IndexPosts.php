<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class IndexPosts extends Component
{
    use WithPagination;

    use WithSorting;

    use WithSearchAndLimitEntries;

    public function render()
    {
        return view('livewire.index-posts', [
            'posts' => Post::where('title', 'like', '%'.$this->search.'%')
                            ->orderBy($this->sortBy, $this->sortDirection)
                            ->paginate($this->no_of_rows),
        ]);
    }
}

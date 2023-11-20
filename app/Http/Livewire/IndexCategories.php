<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class IndexCategories extends Component
{
    use WithPagination;

    use WithSorting;

    use WithSearchAndLimitEntries;

    public function render()
    {
        return view('livewire.index-categories', [
            'categories' => Category::where('name', 'like', '%'.$this->search.'%')
                            ->orderBy($this->sortBy, $this->sortDirection)
                            ->paginate($this->no_of_rows),
        ]);
    }
}

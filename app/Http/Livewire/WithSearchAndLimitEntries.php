<?php 

namespace App\Http\Livewire;

trait WithSearchAndLimitEntries
{
    public $search;

    public $no_of_rows = 5;
 
    protected $updatesQueryString = ['search'];
    protected $updatesNoOfRows = ['no_of_rows'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->no_of_rows = request()->query('no_of_rows', $this->no_of_rows);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
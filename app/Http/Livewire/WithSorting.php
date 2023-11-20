<?php 

namespace App\Http\Livewire;

trait WithSorting
{
    public $sortBy = 'created_at';
    public $sortDirection = 'asc';
 
    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';
 
        $this->sortBy = $field;
    }
 
    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }
}
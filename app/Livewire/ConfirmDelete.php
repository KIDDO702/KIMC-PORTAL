<?php

namespace App\Livewire;

use App\Models\Department;
use Livewire\Component;

class ConfirmDelete extends Component
{

    public $isOpen = true;
    public $itemToDeleteid;

    protected $listeners = ['id', 'collectId'];

    public function collectId(Department $department)
    {
        dd($department);
    }

    public function delete()
    {
        dd(1);
    }

    public function render()
    {
        return view('livewire.confirm-delete');
    }
}

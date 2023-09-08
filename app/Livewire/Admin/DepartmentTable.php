<?php

namespace App\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentTable extends Component
{

    use WithPagination;

    public $perPage = 10;

    public function updatePerPage($newPerPage)
    {
        $this->perPage = $newPerPage;
    }

    public function render()
    {
        return view('livewire.admin.department-table', [
            'departments' => Department::latest()->paginate($this->perPage)
        ]);
    }
}

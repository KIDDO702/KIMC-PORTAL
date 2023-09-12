<?php

namespace App\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class DepartmentTable extends Component
{

    use WithPagination, WireToast;

    public $perPage = 10;
    public $sortBy;

    public function deleteDepartment(Department $department)
    {
        $delete = $department->delete();
        if ($delete) {
            toast()
            ->success('Department deleted successfully')
            ->pushOnNextPage();

            redirect(route('admin.department'));
        } else {
            toast()
            ->danger('Something happened please try again')
            ->pushOnNextPage();

            redirect(route('admin.department'));
        }
    }

    private function getsortedDepartments()
    {
        return Department::orderBy($this->sortBy)->get();
    }

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

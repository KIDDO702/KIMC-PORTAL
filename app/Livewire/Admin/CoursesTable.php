<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use App\Models\CourseLevel;
use App\Models\Department;
use Livewire\Component;

class CoursesTable extends Component
{
    public $courses;
    public $departments;
    public $levels;
    public $selectedDepartment = null;


    public function mount()
    {
        $this->departments = Department::pluck('name', 'id');
        $this->levels = CourseLevel::all();
        $this->courses = Course::with('department', 'level')->get();
    }

    public function deleteCourse(Course $course)
    {
        $delete = $course->delete();

        if ($delete) {
            toast()
                ->success('Courses deleted successfully')
                ->pushOnNextPage();
            redirect(route('admin.course'));
        } else {
            toast()
                ->danger('Something happened please try again')
                ->pushOnNextPage();
            redirect(route('admin.course'));
        }
    }

    public function render()
    {
        $query = Course::query();

        if ($this->selectedDepartment) {
            $query->where('department_id', $this->selectedDepartment);
        }
        return view('livewire.admin.courses-table');
    }
}

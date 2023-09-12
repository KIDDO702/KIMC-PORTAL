<?php

namespace App\Livewire\Admin;

use App\Models\CourseLevel;
use Livewire\Component;

class CourseLevelTable extends Component
{
    public function deleteLevel (CourseLevel $level)
    {
        $delete = $level->delete();

        if ($delete) {
            toast()
                ->success('Course level deleted successfully')
                ->pushOnNextPage();


            redirect(route('admin.level'));
        } else {
            toast()
                ->danger('Something happened')
                ->pushOnNextPage();


            redirect(route('admin.level'));
        }

    }

    public function render()
    {
        return view('livewire.admin.course-level-table', [
            'levels' => CourseLevel::all()
        ]);
    }
}

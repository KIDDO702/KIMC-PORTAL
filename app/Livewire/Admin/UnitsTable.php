<?php

namespace App\Livewire\Admin;

use App\Models\Unit;
use Livewire\Component;

class UnitsTable extends Component
{
    public $units;

    public function mount()
    {
        $this->units = Unit::all();
    }

    public function deleteUnit(Unit $unit)
    {
        if (!$unit) {
            toast()
                ->danger('Unit not found')
                ->pushOnNextPage();

            redirect(route('admin.unit'));
        } else {
            $delete = $unit->delete();

            if ($delete) {
                toast()
                    ->success('Unit deleted successfully')
                    ->pushOnNextPage();

                redirect(route('admin.unit'));
            } else {
                toast()
                    ->danger('something happened please try again')
                    ->pushOnNextPage();

                redirect(route('admin.unit'));
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.units-table');
    }
}

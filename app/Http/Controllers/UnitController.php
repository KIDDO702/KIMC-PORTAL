<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Course;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.unit.create', [
            'courses' => Course::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $unit = new Unit();

        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:units,code',
            'description' => 'nullable',
            'courses' => 'required|array',
            'courses.*' => 'string'
        ]);

        $unit->name = $request->input('name');
        $unit->code = $request->input('code');

        // Slug
        $slug = Str::slug($request->input('name'));
        $count = Unit::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $unit->slug = $slug;

        $unit->description = $request->input('description');

        $selectedCourses = $request->input('courses');
        $save = $unit->save();

        $unit->course()->sync($selectedCourses);

        if ($save) {
            toast()
                ->success('Unit added successfully')
                ->push();

            return redirect(route('unit.create'));
        } else {
            toast()
                ->danger('Something happened please try again')
                ->push();

            return redirect(route('unit.create'));
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unit = Unit::find($id);
        $courses = Course::all();

        if (!$unit) {
            toast()
                ->warning('No unit found, please try again')
                ->pushOnNextPage();

            return redirect(route('admin.unit'));
        } else {
            return view('admin.unit.edit', compact('unit', 'courses'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'description' => 'nullable',
            'courses.*' => 'string'
        ]);

        $unit->name = $request->input('name');
        $unit->code = $request->input('code');

        // Slug
        $slug = Str::slug($request->input('name'));
        $count = Unit::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $unit->slug = $slug;

        $unit->description = $request->input('description');

        $selectedCourses = $request->input('courses');
        $detachCourses = $request->input('deletedCourses');

        // dd($detachCourses);
        $update = $unit->update();

        if ($selectedCourses) {
            $unit->course()->attach($selectedCourses);
        }

        if ($detachCourses) {
            $unit->course()->detach($detachCourses);
        }

        if ($update) {
            toast()
                ->success($unit->name.' updated successfully')
                ->pushOnNextPage();

            return redirect(route('admin.unit'));
        } else {
            toast()
                ->danger('something happened please try again')
                ->pushOnNextPage();

            return redirect(route('admin.unit'));
        }


        dd($request, $unit);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

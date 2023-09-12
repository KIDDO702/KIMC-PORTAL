<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\CourseLevel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CourseLevelController extends Controller
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
        return view('admin.level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4|unique:course_levels,name,',
            'description' => 'nullable'
        ]);

        $slug = Str::slug($validated['name']);

        // Check If Slug exists
        $count = CourseLevel::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $validated['slug'] = $slug;

        // dd($validated['slug']);

        $saved = CourseLevel::create($validated);

        if ($saved) {
            toast()
                ->success('Course Level added successfully')
                ->push();
            return redirect(route('level.create'));
        } else {
            toast()
                ->danger('Something happened please try again')
                ->push();
            return redirect(route('level.create'));
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
        $level = CourseLevel::find($id);

        if (!$level) {
            toast()
                ->danger('Course Level not found')
                ->pushOnNextPage();
            return redirect(route('admin.level'));
        }

        return view('admin.level.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseLevel $level)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $slug = Str::slug($validated['name']);

        // Check If Slug exists
        $count = CourseLevel::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $validated['slug'] = $slug;

        $update = $level->update($validated);

        if ($update) {
            toast()
                ->success('Course level updated successfully')
                ->pushOnNextPage();
            return redirect(route('admin.level'));
        } else {
            toast()
                ->warning('Something happened please try again')
                ->pushOnNextPage();
            return redirect(route('admin.level'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

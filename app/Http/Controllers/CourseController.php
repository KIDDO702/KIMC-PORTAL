<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\CourseLevel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();

        return response()->json($courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.create', [
            'departments' => Department::all(),
            'levels' => CourseLevel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'code' => 'required|unique:courses,code',
            'period' => 'required|numeric',
            'department_id' => 'required',
            'level_id' => 'required',
            'description' => 'required'
        ]);

        $slug = Str::slug($validated['name']);

        // Check If Slug exists
        $count = Course::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $validated['slug'] = $slug;

        // Image upload
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('course-uploads', 'public');
        }

        $validated['featured'] = $request->has('featured');

        $save = Course::create($validated);

        if ($save) {
            toast()
                ->success('Course created successfully')
                ->push();
            return redirect(route('course.create'));
        } else {
            toast()
                ->danger('Something happened please try again')
                ->push();

            return redirect(route('course.create'));
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
    public function edit(Course $course)
    {
        // $course = Course::find($id);

        if (!$course) {
            toast()
                ->danger('Course not found')
                ->pushOnNextPage();
            return redirect(route('admin.course'));
        }

        return view('admin.course.edit', [
            'course' => $course,
            'departments' => Department::all(),
            'levels' => CourseLevel::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'code' => 'required',
            'period' => 'required|numeric',
            'department_id' => 'required',
            'level_id' => 'required',
            'description' => 'required'
        ]);

        $slug = Str::slug($validated['name']);

        // Check If Slug exists
        $count = Course::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $validated['slug'] = $slug;

        // Image upload
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('course-uploads', 'public');
        }

        $validated['featured'] = $request->has('featured');

        $update = $course->update($validated);

        if ($update) {
            toast()
                ->success('Course edited successfully')
                ->pushOnNextPage();
            return redirect(route('admin.course'));
        } else {
            toast()
                ->danger('Something happened please try again')
                ->pushOnNextPage();

            return redirect(route('course.create'));
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

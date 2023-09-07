<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DepartmentController extends Controller
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
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|min:4',
            'location' => 'required|min:4',
            'contact' => 'required|min:10',
            'type' => 'required|numeric',
            'description' => 'required' 
        ]);

        $slug = Str::slug($validated['name']);

        // Check If Slug exists
        $count = Department::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug.'-'.($count + 1);
        }

        $validated['slug'] = $slug;


        // Image upload
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('department-uploads', 'public');
        }

        $saved = Department::create($validated);
        if ($saved) {
            toast()
                ->success('Department added succesfully')
                ->push();
            return redirect(route('admin.department'));
        }
        else {
            toast()
                ->danger('Something happed please  try again')
                ->push();
            return redirect(route('admin.department'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index');
    }

    public function department(): View
    {
        return view('admin.department.index');
    }

    public function level (): View
    {
        return view('admin.level.index');
    }

    public function course(): View
    {
        return view('admin.course.index');
    }

    public function unit(): View
    {
        return view('admin.unit.index');
    }
}

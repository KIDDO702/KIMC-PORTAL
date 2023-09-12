<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseLevelController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group( function () {
    Route::get('/home', function () {
        return view('home');
    });

    // Admin Routes Guarded by spatie roles
    Route::middleware('role:admin')->group( function() {
        Route::prefix('admin')->group( function () {
            Route::get('/', [AdminController::class, 'index'])->name('admin.index');

            // Department Routes & Controllers
            Route::prefix('/deparment')->group(function () {
                Route::get('/', [AdminController::class, 'department'])->name('admin.department');
                Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
                Route::post('/create', [DepartmentController::class, 'store'])->name('department.store');
                Route::get('/e/{department}', [DepartmentController::class, 'edit'])->name('department.edit');
                Route::put('/e/{department}', [DepartmentController::class, 'update'])->name('department.update');
            });

            Route::prefix('/course-level')->group( function () {
                Route::get('/', [AdminController::class, 'level'])->name('admin.level');
                Route::get('/create', [CourseLevelController::class, 'create'])->name('level.create');
                Route::post('/create', [CourseLevelController::class, 'store'])->name('level.store');
                Route::get('e/{level}', [CourseLevelController::class, 'edit'])->name('level.edit');
                Route::put('e/{level}', [CourseLevelController::class, 'update'])->name('level.update');
            });

            Route::prefix('course')->group( function () {
                Route::get('/', [AdminController::class, 'course'])->name('admin.course');
                Route::get('/create', [CourseController::class, 'create'])->name('course.create');
                Route::post('/create', [CourseController::class, 'store'])->name('course.store');
            });
        });
    });
});

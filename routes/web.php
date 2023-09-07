<?php

use App\Http\Controllers\AdminController;
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
            });
        });
    });
});

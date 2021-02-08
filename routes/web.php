<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






Route::group(['prefix' => '/sprint5'], function () {
    
    Auth::routes();
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    
    Route::get('/welcome', function () { return view('welcome'); })->middleware('auth')->name('home');
    
    Route::get('/employees', [EmployeeController::class, 'index'])->middleware('auth')->name('employees.index');
    Route::post('/employees', [EmployeeController::class, 'store'])->middleware('auth')->name('employees.store');
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->middleware('auth')->name('employees.destroy');
    Route::get('/employees/{id}', [EmployeeController::class, 'show'])->middleware('auth')->name('employees.show');
    Route::put('/employees/{id}', [EmployeeController::class, 'update'])->middleware('auth')->name('employees.update');

    Route::get('/projects', [ProjectController::class, 'index'])->middleware('auth')->name('projects.index');
    Route::post('/projects', [ProjectController::class, 'store'])->middleware('auth')->name('projects.store');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->middleware('auth')->name('projects.destroy');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->middleware('auth')->name('projects.show');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->middleware('auth')->name('projects.update');
});

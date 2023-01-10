<?php

use \App\Http\Controllers\ProjectController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\AdminLoginController;
//use \App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::resource('projects', ProjectController::class);
//->middleware('admin');
Route::get('/search', [ProjectController::class, 'search']);
Route::get('/delete/{id}', [ProjectController::class, 'delete'])->name('delete');
//Route::get('/projects/{id}', [ProjectController::class, 'view'])->name('view');
//Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('edit');
Route::get('ShowAgain/{id}', [ProjectController::class,'showAgain'])->name('showAgain');
Route::get('hide/{id}', [ProjectController::class,'hide'])->name('hide');
Auth::routes();

//
//Route::get('/admin',[ProjectController::class, 'index'])->name('admin.index')->middleware('admin');
//Route::get('/showUser',[ProjectController::class, 'showUser'])->name('admin.showUser')->middleware('admin');



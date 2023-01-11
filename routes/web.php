<?php

use \App\Http\Controllers\ProjectController;
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
Route::middleware(['admin'])->group(function () {
Route::resource('projects', ProjectController::class);
Auth::routes();
Route::get('/search', [ProjectController::class, 'search']);
Route::get('/delete/{id}', [ProjectController::class, 'delete'])->name('delete');
Route::get('/projects/{id}', [ProjectController::class, 'view'])->name('view');
Route::get('ShowAgain/{id}', [ProjectController::class,'showAgain'])->name('showAgain');
Route::get('hide/{id}', [ProjectController::class,'hide'])->name('hide');

//Admin Routes
Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');
Route::get('/showUser',[AdminController::class, 'showUser'])->name('admin.showUser');
Route::get('/deleteUser/{id}',[AdminController::class, 'deleteUser'])->name('admin.deleteUser');
Route::get('/userCount', [AdminController::class, 'userCount'])->name('admin.users');
});



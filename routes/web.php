<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('index');
Route::get('/done/{id}', [App\Http\Controllers\TaskController::class, 'done'])->name('done');
Route::get('/undone/{id}', [App\Http\Controllers\TaskController::class, 'undone'])->name('undone');
Route::post('/store', [App\Http\Controllers\TaskController::class, 'store'])->name('store');
Route::get('/create', [App\Http\Controllers\TaskController::class, 'create'])->name('create');
Route::get('/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('edit');
Route::get('/delete/{id}', [App\Http\Controllers\TaskController::class, 'delete'])->name('delete');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;

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



Route::get('projects/{project}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::resource('projects', ProjectController::class);

Route::post('projects/{project}/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::patch('tasks/{task}/status/{status}', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');

Route::post('tasks/{task}/comments', [CommentController::class, 'store'])->name('comments.store');

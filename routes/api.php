<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ProjectController;
use app\Http\Controllers\TaskController;
use app\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::post('/projects', [ProjectController::class, 'store']);

Route::middleware('auth:api')->group(function () {
    Route::apiResource('projects', ProjectController::class);
    Route::post('projects/{project}/tasks', [TaskController::class, 'store']);
    Route::patch('tasks/{task}/status/{status}', [TaskController::class, 'updateStatus']);
    Route::post('tasks/{task}/comments', [CommentController::class, 'store']);
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/task/{id}', [TasksController::class, 'show']);
Route::get('/task/list', [TasksController::class, 'index']);
Route::post('/task/create', [TasksController::class, 'create']);
Route::put('/task/update/{id}', [TasksController::class, 'update']);
Route::delete('/task/delete/{id}', [TasksController::class, 'destroy']);

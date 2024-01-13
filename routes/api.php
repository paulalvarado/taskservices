<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\StageController;

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

Route::prefix('task')->group(function () {
    Route::get('/{id}', [TasksController::class, 'show']);
    Route::get('/list', [TasksController::class, 'index']);
    Route::post('/create', [TasksController::class, 'create']);
    Route::put('/update/{id}', [TasksController::class, 'update']);
    Route::delete('/delete/{id}', [TasksController::class, 'destroy']);
});

Route::prefix('stage')->group(function () {
    Route::get('/', [StageController::class, 'index']);
    Route::get('/{id}', [StageController::class, 'show']);
    Route::post('/create', [StageController::class, 'create']);
    Route::put('/update/{id}', [StageController::class, 'update']);
    Route::delete('/delete/{id}', [StageController::class, 'destroy']);
});

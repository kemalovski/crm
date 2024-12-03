<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('employees', [EmployeeController::class, 'index']);
    Route::get('employees/{id}', [EmployeeController::class, 'show']);

    Route::post('tasks', [TaskController::class, 'store']);
    Route::put('tasks/{id}', [TaskController::class, 'update']);
    Route::get('employees/{id}/tasks', [TaskController::class, 'index']);
    Route::patch('tasks/{id}/complete', [TaskController::class, 'complete']);
});

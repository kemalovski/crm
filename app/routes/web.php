<?php

phpinfo();
exit();

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/api/employees', [EmployeeController::class, 'index']);
// Route::get('/api/employees/{id}/tasks', [TaskController::class, 'getTasks']);
// Route::post('/api/tasks', [TaskController::class, 'store']);
// Route::put('/api/tasks/{id}', [TaskController::class, 'update']);
// Route::patch('/api/tasks/{id}/complete', [TaskController::class, 'markComplete']);

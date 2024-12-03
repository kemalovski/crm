<?php
// app/Http/Controllers/TaskController.php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Employee;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Responses\ApiResponse;

class TaskController extends Controller
{
    public function store(TaskStoreRequest $request)
    {
        try {
            $task = Task::create($request->validated());
            return new ApiResponse(
                true,
                "task has been created",
                $task->toArray(),
                201
            );
        } catch (\Exception $e) {
            return new ApiResponse(
                false,
                $e->getMessage(),
                [],
                500
            );
        }
    }

    public function update(TaskUpdateRequest $request, $id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->update($request->validated());
            return new ApiResponse(
                true,
                "task has been updated",
                $task->toArray(),
                200
            );
        } catch (\Exception $e) {
            return new ApiResponse(
                false,
                $e->getMessage(),
                [],
                500
            );
        }
    }

    public function getTasks($employeeId)
    {
        try {
            $employee = Employee::find($employeeId);
            return new ApiResponse(
                true,
                "here is employee tasks",
                $employee->tasks,
                200
            );
        } catch (\Exception $e) {
            return new ApiResponse(
                false,
                $e->getMessage(),
                [],
                500
            );
        }
    }

    public function markComplete($id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->status = 'completed';
            $task->save();
            return new ApiResponse(
                true,
                "here is employee tasks",
                $task,
                200
            );
        } catch (\Exception $e) {
            return new ApiResponse(
                false,
                $e->getMessage(),
                [],
                500
            );
        }
    }
}

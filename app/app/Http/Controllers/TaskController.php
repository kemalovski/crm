<?php
// app/Http/Controllers/TaskController.php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Employee;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(TaskStoreRequest $request)
    {
        $task = Task::create($request->validated());
        return response()->json($task, 201);
    }

    public function update(TaskUpdateRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());
        return response()->json($task, 200);
    }

    public function index($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        return response()->json($employee->tasks, 200);
    }

    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'completed';
        $task->save();
        return response()->json($task, 200);
    }
}

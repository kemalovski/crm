<?php
// app/Http/Controllers/EmployeeController.php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return response()->json(Employee::all(), 200);
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json($employee, 200);
    }
}

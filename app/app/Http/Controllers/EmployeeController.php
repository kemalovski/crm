<?php
// app/Http/Controllers/EmployeeController.php
namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        try {

            return new ApiResponse(
                true,
                'Employees retrieved successfully.',
                Employee::all()->toArray(),
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

    public function show($id)
    {
        try {

            $employee = Employee::findOrFail($id)->toArray();

            return new ApiResponse(
                true,
                'Here is employee',
                $employee,
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

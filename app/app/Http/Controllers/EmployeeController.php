<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Tüm çalışanları listele.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Tüm çalışanları getir
        $employees = Employee::all();

        // Çalışanları JSON formatında döndür
        return response()->json($employees);
    }
}

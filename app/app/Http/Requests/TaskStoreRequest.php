<?php
// app/Http/Requests/TaskStoreRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Herkese izin ver
    }

    public function rules()
    {
        return [
            'employee_id' => 'required', //exists:employees,id
            'title' => 'required|string|max:255',
            'status' => 'required|in:pending,in_progress,completed',
        ];
    }
}

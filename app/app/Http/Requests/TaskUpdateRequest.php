<?php
// app/Http/Requests/TaskUpdateRequest.php
namespace App\Http\Requests;

class TaskUpdateRequest extends BaseRequest
{
    public function authorize()
    {
        return true; // Herkese izin ver
    }

    public function rules()
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'title' => 'nullable|string|max:255',
            'status' => 'nullable|in:pending,in_progress,completed',
        ];
    }
}

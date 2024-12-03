<?php
// app/Http/Requests/TaskUpdateRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Herkese izin ver
    }

    public function rules()
    {
        return [
            'title' => 'nullable|string|max:255',
            'status' => 'nullable|in:pending,in_progress,completed',
        ];
    }
}

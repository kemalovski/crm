<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Arr;

class ApiResponse implements Responsable
{
    protected bool $success;
    protected string $message;
    protected mixed $data;
    protected int $httpResponse;

    public function __construct(bool $success, string $message = '', mixed $data = null, int $httpResponse)
    {
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;
        $this->httpResponse = $httpResponse;
    }

    public function toResponse($request)
    {
        return response()->json([
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->data,
        ], $this->httpResponse);
    }
}

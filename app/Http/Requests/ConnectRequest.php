<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConnectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'license' => ['required', 'uuid', 'exists:licenses,id'],
            'connection' => ['uuid', 'exists:connection,id'],
        ];
    }
}

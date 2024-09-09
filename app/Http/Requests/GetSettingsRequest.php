<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'connectionUuid'   =>  ['required', 'uuid', 'exists:licenses,id']
        ];
    }
}

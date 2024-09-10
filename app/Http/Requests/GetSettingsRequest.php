<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Knuckles\Scribe\Attributes\BodyParam;

#[BodyParam('connectionUuid', 'string', 'UUID соединения', required: true, example: 'Макс')]
class GetSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'connectionUuid'   =>  ['required', 'uuid', 'exists:connections,id']
        ];
    }
}

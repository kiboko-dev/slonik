<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Knuckles\Scribe\Attributes\BodyParam;

#[BodyParam('connectionUuid', 'string', 'UUID соединения', required: true, example: 'e3b84e41-5c09-39e0-bd31-d17747001df6')]
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

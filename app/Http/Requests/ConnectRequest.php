<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Knuckles\Scribe\Attributes\BodyParam;

#[BodyParam('connection', 'string', 'UUID соединения', required: false, example: 'e3b84e41-5c09-39e0-bd31-d17747001df6')]
class ConnectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'connection' => ['uuid', 'exists:connections,id'],
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetSettingsRequest;
use App\Http\Services\SettingsService;
use Illuminate\Http\JsonResponse;
use Knuckles\Scribe\Attributes as SA;
use Symfony\Component\HttpFoundation\Response;

#[
    SA\Group('Настройки')
]
class SettingController extends Controller
{
    #[
        SA\Endpoint(
            title: 'Получить настройки',
            description: 'Возвращает все настройки для конкретного подключения, или настройки по умолчанию'
        ),
        SA\Response(content: '', status: Response::HTTP_OK, description: 'OK'),
        SA\Response(content: '', status: Response::HTTP_BAD_REQUEST, description: 'Bad request'),
        SA\Response(content: '', status: Response::HTTP_CONFLICT, description: 'Conflict'),
    ]
    public function getByConnection(GetSettingsRequest $settingsRequest, SettingsService $settingsService): JsonResponse
    {
        $connectionUuid = $settingsRequest->validated('connectionUuid');

        return response()->json(
            $settingsService->getByConnectionUuid($connectionUuid)
        );
    }
}

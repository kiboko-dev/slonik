<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetSettingsRequest;
use app\Services\SettingsService;
use Illuminate\Http\JsonResponse;

class SettingController extends Controller
{
    public function getByConnection(GetSettingsRequest $settingsRequest, SettingsService $settingsService): JsonResponse
    {
        $connectionUuid = $settingsRequest->validated('connectionUuid');

        return response()->json(
            $settingsService->getByConnectionUuid($connectionUuid)
        );
    }
}

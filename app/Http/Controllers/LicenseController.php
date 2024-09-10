<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConnectRequest;
use app\Services\LicenseService;
use Illuminate\Http\JsonResponse;
use Knuckles\Scribe\Attributes as SA;
use Symfony\Component\HttpFoundation\Response;

#[
    SA\Group('Подключения')
]
class LicenseController extends Controller
{
    #[
        SA\Endpoint(
            title: 'Подключиться',
            description: 'Выполняется подключение. Если UUID подключения создаётся новое подключение, 
                          если не исчерпан лимит подключений заданный в лицензии.'
        ),
        SA\Response(content: '', status: Response::HTTP_OK, description: 'OK'),
        SA\Response(content: '', status: Response::HTTP_BAD_REQUEST, description: 'Bad request'),
        SA\Response(content: '', status: Response::HTTP_CONFLICT, description: 'Conflict'),
    ]
    public function connect(ConnectRequest $request, LicenseService $licenseService): JsonResponse
    {
        return response()->json(
            $licenseService->connect(
                license: $request->validated('license'),
                connection: $request->validated('connection')
            )
        );
    }
}

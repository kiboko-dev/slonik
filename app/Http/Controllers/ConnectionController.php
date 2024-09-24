<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConnectRequest;
use App\Http\Services\ConnectionService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Knuckles\Scribe\Attributes as SA;

#[
    SA\Group('Подключения')
]
class ConnectionController extends Controller
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
    public function connect(ConnectRequest $request, ConnectionService $service): JsonResponse
    {
        return response()->json(
            $service->connect($request->validated('connection'))
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConnectRequest;
use app\Services\LicenseService;
use Illuminate\Http\JsonResponse;

class LicenseController extends Controller
{
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

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class ResponseController extends Controller
{
    public function sendResponse(
        array|object|string $result,
        string $message = '',
        int $code = ResponseCode::HTTP_OK
    ): JsonResponse {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $result,
        ], $code);
    }

    public function sendError(string|array $error, int $code): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $error,
        ], $code);
    }
}

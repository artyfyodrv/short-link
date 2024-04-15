<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreLinkRequest;
use App\Services\LinkService;
use Illuminate\Http\JsonResponse;
use Throwable;

class LinkController extends ResponseController
{
    public function store(StoreLinkRequest $request, LinkService $linkService): JsonResponse
    {
        $data = $request->validated();

        try {
            $linkService = $linkService->makeShort($data);

            return $this->sendResponse($linkService);
        } catch (Throwable $t) {
            return $this->sendError($t->getMessage(), 500);
        }
    }
}

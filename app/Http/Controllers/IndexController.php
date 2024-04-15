<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    public function index(string $shortLink): RedirectResponse
    {
        $model = Link::query()->where('modified', $shortLink)->first();

        if (!$model) {
            abort(Response::HTTP_NOT_FOUND);
        }

        $originalUrl = $model['original'];

        if (!preg_match('~^(?:f|ht)tps?://~i', $originalUrl)) {
            $originalUrl = 'https://' . $originalUrl;
        }

        return redirect($originalUrl);
    }
}

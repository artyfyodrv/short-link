<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Link;
use Illuminate\Support\Str;

final class LinkService
{
    public function makeShort(array $request): string
    {
        $model = Link::query()->create([
           'original' => $request['url'],
           'modified' => $this->generateLink()
        ]);

        $url = $model['modified'];

        return url("/$url");
    }

    private function generateLink(): string
    {
        $shortUrl = Str::random(8);
        $isExists = Link::query()->where('modified', $shortUrl)->exists();

        if ($isExists === true) {
            return $this->generateLink();
        }

        return $shortUrl;
    }

}

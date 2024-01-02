<?php

namespace App\Repositories;

use App\Models\Link;

class LinkRepository
{
    public function getLinkByDestinationUrl(string $url): ?Link
    {
        return Link::where('destination_url', $url)->first();
    }

    public function getLinkByHash(string $hash): ?Link
    {
        return Link::where('hash', $hash)->first();
    }
}

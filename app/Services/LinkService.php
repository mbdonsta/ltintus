<?php

namespace App\Services;

use App\Models\Link;
use App\Repositories\LinkRepository;
use Illuminate\Support\Str;

class LinkService
{
    public function __construct(public LinkRepository $linkRepository)
    {
    }

    public function createLink(array $attributes): Link
    {
        $url = $this->linkRepository->getLinkByDestinationUrl($attributes['destination_url']);

        if (!$url) {
            $attributes['hash'] = $this->generateLinkHash();
            $url = Link::create($attributes);
        }

        return $url;
    }

    private function generateLinkHash(): string
    {
        do {
            $hash = Str::random(Link::HASH_LENGTH);
        } while ($this->linkRepository->getLinkByHash($hash));

        return $hash;
    }
}

<?php

namespace App\Http\Controllers;

use App\Contracts\UrlCheckerInterface;
use App\Http\Requests\LinkPostRequest;
use App\Repositories\LinkRepository;
use App\Services\LinkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    public function __construct(
        public LinkService $linkService,
        public UrlCheckerInterface $urlChecker,
        public LinkRepository $linkRepository
    ) {
    }

    public function post(LinkPostRequest $request): JsonResponse
    {
        $attributes = $request->validated();

        if (!$this->urlChecker->urlIsSafe($attributes['destination_url'])) {
            return response()->json([
                'status' => 'Error',
                'errors' => [
                    'destination_url' => [
                        'Your URL is not safe!'
                    ],
                ],
            ], 422);
        }

        $link = $this->linkService->createLink($attributes);

        return response()->json([
            'status' => 'OK',
            'data' => [
                'short_url' => $link->getShortUrl(),
                'destination_url' => $link->getDestinationUrl(),
            ],
        ]);
    }

    public function redirectToDestination(string $hash): RedirectResponse
    {
        $link = $this->linkRepository->getLinkByHash($hash);

        if (!$link) {
            return redirect()->route('pages.home');
        }

        return redirect($link->getDestinationUrl());
    }
}

<?php

namespace App\Contracts;

interface UrlCheckerInterface
{
    public function urlIsSafe(string $url): bool;
}

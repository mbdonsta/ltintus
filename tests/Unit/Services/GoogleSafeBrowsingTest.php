<?php

namespace Tests\Unit\Services;

use App\Services\GoogleSafeBrowsing;
use Tests\TestCase;

class GoogleSafeBrowsingTest extends TestCase
{
    public function testCheckIfUrlIsSafe(): void
    {
        $urlChecker = new GoogleSafeBrowsing();
        $this->assertEquals(true, $urlChecker->urlIsSafe('https://google.com'));
    }
}

<?php

namespace Tests\Feature\Pages;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testUserCanSeeHomePage(): void
    {
        $response = $this->get(route('pages.home'));

        $response->assertStatus(200)->assertViewIs('pages.home');
    }
}

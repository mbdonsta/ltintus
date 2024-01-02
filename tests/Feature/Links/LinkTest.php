<?php

namespace Tests\Feature\Links;

use App\Models\Link;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LinkTest extends TestCase
{
    use DatabaseTransactions;

    public function testUserCanSubmitUrl(): void
    {
        $url = fake()->url();
        $response = $this->post(route('links.post'), [
            'destination_url' => $url
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'status' => 'OK',
            ]);
    }

    public function testShortUrlRedirectsToDestinationUrl(): void
    {
        $data = [
            'destination_url' => 'https://google.com',
            'hash' => 'abcdef'
        ];
        $link = Link::factory()->create($data);

        $response = $this->get($link->getShortUrl());

        $response->assertRedirect($data['destination_url']);
    }

    public function testRedirectToHomePageIfShortUrlDoesNotExist(): void
    {
        $response = $this->followingRedirects()->get(route('links.redirect_to_destination', ['hash' => '------']));

        $response->assertStatus(200)
            ->assertViewIs('pages.home');
    }
}

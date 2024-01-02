<?php

namespace App\Services;

use App\Contracts\UrlCheckerInterface;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GoogleSafeBrowsing implements UrlCheckerInterface
{
    private string $apiKey;
    private string $apiUrl = 'https://safebrowsing.googleapis.com/v4/threatMatches:find';

    public function __construct()
    {
        $this->apiKey = config('google_safe_browsing.api_key');
    }

    public function urlIsSafe(string $url): bool
    {
        try {
            $requestData = [
                'client' => [
                    'clientId' => 'donsta',
                    'clientVersion' => '1.5.2'
                ],
                'threatInfo' => [
                    'threatTypes' => [
                        'MALWARE',
                        'SOCIAL_ENGINEERING',
                        'THREAT_TYPE_UNSPECIFIED',
                        'UNWANTED_SOFTWARE'
                    ],
                    'platformTypes' => [
                        'ANY_PLATFORM'
                    ],
                    'threatEntryTypes' => [
                        'URL'
                    ],
                    'threatEntries' => [
                        [
                            'url' => $url
                        ]
                    ],
                ],
            ];
            $response = Http::contentType('application/json')->post($this->apiUrl . '?key=' . $this->apiKey, $requestData);

            return empty($response->json());
        } catch (Exception $e) {
            Log::error('There was an error during google safe browsing check: ' . $e->getMessage());

            return false;
        }
    }
}

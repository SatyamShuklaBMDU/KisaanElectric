<?php

namespace App\Services;

use GuzzleHttp\Client;

class SMSService
{
    private $apiKey;
    private $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.sms.api_key');
        $this->baseUrl = config('services.sms.base_url');
    }

    public function sendSMS($to, $message)
    {
        $client = new Client();

        $response = $client->post($this->baseUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
            'json' => [
                'to' => $to,
                'message' => $message,
            ],
        ]);

        return $response->getBody()->getContents();
    }
}

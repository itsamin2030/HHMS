<?php

namespace App\Services\Twilio;
use Twilio\Rest\Client;

class TwilioService
{
    protected $client;
    public function __construct()
    {
        $this->client = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }
    public function sendSMS($to, $message)
    {
        return $this->client->messages->create($to, [
            'from' => env('TWILIO_PHONE_NUMBER'),
            'body' => $message,
        ]);
    }
}

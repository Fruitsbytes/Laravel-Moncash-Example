<?php

namespace App\Services\MonCash;

use MonCashAPIClient;

class AuthService
{

    public MonCashAPIClient $client;

    public function __construct(
        // secretProvider
    )
    {
        $this->client = new MonCashAPIClient(config('moncash.clientId'), config('moncash.clientSecret'));
    }


    /**
     * @return string
     */
    public function getToken(): string
    {
        return ''; // TODO
    }

}

<?php

namespace App\Services\MonCash;

use App\Exceptions\MonCash\Exception;
use App\Facades\MonCash\HTTP;
use App\MonCash\APIClient;
use Exception as E;

class AuthService
{

    private APIClient $client;

    public function __construct()
    {
        $this->client = new APIClient(config('moncash.clientId'), config('moncash.clientSecret'));
    }


    /**
     * @return string
     * @throws Exception
     */
    public function getToken(): string
    {
        try {
            $response = HTTP::postFormURLEncoded('/oauth/token', [
                'scope'      => 'read,write',
                'grant_type' => 'client_credentials'
            ], 'Basic');

            $response->throw();

            return $response['access_token'];

        } catch (E $e) {
            throw  new Exception('Could not authenticate request', 0, $e);
        }
    }

    public function getClientId():string{
        return $this->client->id;
    }

    public function getClientSecret():string{
        return $this->client->secret;
    }

}

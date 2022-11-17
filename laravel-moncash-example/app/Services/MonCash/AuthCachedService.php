<?php

namespace App\Services\MonCash;

use App\Exceptions\MonCash\Exception;
use App\Facades\MonCash\HTTP;
use Exception as E;
use Illuminate\Support\Facades\Cache;

class AuthCachedService extends AuthService
{

    /**
     * @return string
     * @throws Exception
     */
    public function getToken(): string
    {
        try {
            return Cache::remember('token', config('moncash.ttl', 50), function () {

                $response = HTTP::postFormURLEncoded('/oauth/token', [
                    'scope'      => 'read,write',
                    'grant_type' => 'client_credentials'
                ], 'Basic');


                $response->throw();

                return $response['access_token'];

            });

        } catch (E $e) {
            throw  new Exception('Could not authenticate request', 0, $e);
        }
    }

}

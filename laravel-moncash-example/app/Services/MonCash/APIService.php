<?php

namespace App\Services\MonCash;

use App\Exceptions\MonCash\Exception;
use App\Facades\MonCash\HTTP;

class APIService
{
    const GATEWAY_BASE = [
        "production" => "https://moncashbutton.digicelgroup.com/Moncash-middleware",
        "sandbox"    => "https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware"
    ];

    public function __construct()
    {

    }

    /**
     * @param  string  $orderId
     * @param  int  $amount
     *
     * @return string
     * @throws Exception
     */
    public function createPayement(string $orderId, int $amount): string
    {
        try {
            $reponse = HTTP::postJson(
                '/v1/CreatePayment',
                json_encode([
                        "orderId" => $orderId, "amount" => $amount
                    ]
                )
            );
            $reponse->throw();
            // TODO re-use token if noting changed and it is still valid
            return self::GATEWAY_BASE[HTTP::getMode()].'/Payment/Redirect?token='.$reponse['payment_token']['token'];
        } catch (\Exception $e) {
            throw new Exception('Could not create payment', 0, $e);
        }
    }
}

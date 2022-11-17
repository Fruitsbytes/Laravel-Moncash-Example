<?php

namespace App\Services\MonCash;

use App\Exceptions\MonCash\Exception;
use App\Facades\MonCash\HTTP;
use App\Models\Payment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;

class APIService
{
    const GATEWAY_BASE = [
        "production" => "https://moncashbutton.digicelgroup.com/Moncash-middleware",
        "sandbox"    => "https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware"
    ];


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

    /**
     * @param  string  $orderId
     *
     * @return Payment
     * @throws RequestException | ModelNotFoundException<Payment>
     */
    public function getOrder(string $orderId): Payment
    {
        $response = $this->getRawOrder($orderId);

        $response->throw();

        return $this->rawToPayment( $response);
    }

    /**
     * @param  string|int  $transactionId
     *
     * @return Payment
     * @throws RequestException
     */
    public function getTransaction(string|int $transactionId): Payment
    {
        $response = $this->getRawTransaction($transactionId);
        $response->throw();

        return $this->rawToPayment( $response);
    }

    public function rawToPayment(Response $response): Payment
    {
        $payment                = new Payment();
        $payment->payer         = $response['payment']['payer'];
        $payment->transactionID = $response['payment']['transaction_id'];
        $payment->orderID       = $response['payment']['reference'];
        $payment->cost          = $response['payment']['cost'];
        $payment->message       = $response['payment']['message'];

        return $payment;
    }

    public function getRawTransaction(string|int $transactionId): Response
    {
        return HTTP::postJson(
            '/v1/RetrieveTransactionPayment',
            json_encode([
                    "transactionId" => $transactionId
                ]
            )
        );
    }

    public function getRawOrder(string|int $orderId): Response
    {
        return HTTP::postJson(
            '/v1/RetrieveOrderPayment',
            json_encode([
                    "orderId" => $orderId
                ]
            )
        );
    }

}

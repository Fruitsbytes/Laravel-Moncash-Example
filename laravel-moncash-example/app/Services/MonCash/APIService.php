<?php

namespace App\Services\MonCash;

use App\Exceptions\MonCash\Exception;
use App\Facades\MonCash\HTTP;
use App\Models\Payment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Client\RequestException;

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
        $reponse = HTTP::postJson(
            '/v1/RetrieveOrderPayment',
            json_encode([
                    "orderId" => $orderId
                ]
            )
        );
        $reponse->throw();

        $payment                = new Payment();
        $payment->payer         = $reponse['payment']['payer'];
        $payment->transactionID = $reponse['payment']['transaction_id'];
        $payment->orderID       = $reponse['payment']['reference'];
        $payment->cost          = $reponse['payment']['cost'];
        $payment->message       = $reponse['payment']['message'];

        return $payment;
    }

    /**
     * @param  string  $transactionId
     *
     * @return Payment
     * @throws RequestException | ModelNotFoundException<Payment>
     */

    public function getTransaction(string $transactionId): Payment
    {
        $reponse = HTTP::postJson(
            '/v1/RetrieveTransactionPayment',
            json_encode([
                    "transactionId" => $transactionId
                ]
            )
        );
        $reponse->throw();

        $payment                = new Payment();
        $payment->payer         = $reponse['payment']['payer'];
        $payment->transactionID = $reponse['payment']['transaction_id'];
        $payment->orderID       = $reponse['payment']['reference'];
        $payment->cost          = $reponse['payment']['cost'];
        $payment->message       = $reponse['payment']['message'];

        return $payment;

    }

}

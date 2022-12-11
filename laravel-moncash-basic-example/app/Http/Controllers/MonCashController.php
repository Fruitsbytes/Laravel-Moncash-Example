<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

define(
    'HOST_REST_API',
    config('moncash.mode') === 'production' ?
        'https://moncashbutton.digicelgroup.com/Api' :
        'https://sandbox.moncashbutton.digicelgroup.com/Api'
);

define(
    'GATEWAY_BASE',
    config('moncash.mode') === 'production' ?
        'https://moncashbutton.digicelgroup.com/Moncash-middleware' :
        'https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware'
);


class MonCashController extends Controller
{
    public function pay(Request $req)
    {
        $amount = (int) $req->input('amount');

        if ($amount <= 0) {
            return $this->sendError("ou ap voye on move montant: $amount  HTG");
        }

        try {
            $token = $this->getToken();
            $url   = $this->getReDirectionURL($token, $amount);

            return redirect()->away($url);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function notify(Request $req)
    {
        $transactionId = $req->input('transactionId');
        // --> Do something with the confirmation from the server

        // <--
        return response()->json([
            'OK' => '200',
            "transactionId" => $transactionId
        ]);
    }

    public function success(Request $req)
    {
        $transactionId = $req->input('transactionId');
        return $this->sendSuccess("TransactionID: $transactionId");
    }

    private function getToken(): string
    {
        return Cache::remember('token', config('moncash.ttl', 50), function () {

            $response = Http::withBasicAuth(
                config('moncash.clientId', ''),
                config('moncash.clientSecret', '')
            )->asForm()->post(
                HOST_REST_API.'/oauth/token',
                [
                    'scope'      => 'read,write',
                    'grant_type' => 'client_credentials'
                ]
            );

            $response->throw();

            return $response['access_token'];
        });
    }

    /**
     * @param  string  $accessToken
     * @param $amount
     *
     * @return string
     * @throws RequestException
     */
    private function getReDirectionURL(string $accessToken, $amount): string
    {

        $orderId = Str::uuid()->toString();

        $response = Http::withToken($accessToken)
                        ->withBody(
                            '{"amount": '.$amount.',"orderId": "'.$orderId.'"}',
                            'application/json'
                        )->post(HOST_REST_API.'/v1/CreatePayment');

        $response->throw();

//        Cache::tags(['orders'])->put("order::".$orderId, $amount);
        // TODO save order in session

        return GATEWAY_BASE.'/Payment/Redirect?token='.$response['payment_token']['token'];

    }

    private function sendError(string $errorMessage = '')
    {
        return redirect()->to(route('welcome')."/#error")->with(["monCash.error" => "Li enposib pou voye komanse peman an.\r\n  $errorMessage"]);
    }

    private function sendSuccess(string $successMessage = '')
    {
        return redirect()->to(route('welcome')."/#success")->with(["monCash.success" => "Mèsi pou kontribisyon ou.\r\n  $successMessage"]);
    }


}

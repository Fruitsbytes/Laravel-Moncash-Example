<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessMonCashPayment;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MonCashController extends Controller
{
    /**
     * Get WebHook Notification from MonCash
     *
     * @param  Request  $req
     *
     * @return JsonResponse
     */
    public function notify(Request $req)
    {
        $transactionId = $req->input('transactionId');

        try {
            $this->processTransaction($transactionId);
        } catch (Exception $e) {
            return response()->json([
                'FAILED'        => '400',
                "transactionId" => $transactionId
            ], 400);
        }

        return response()->json([
            'OK'            => '200',
            "transactionId" => $transactionId
        ]);
    }


    private function processTransaction(string|int $transactionId)
    {
        ProcessMonCashPayment::dispatch($transactionId);
    }
}

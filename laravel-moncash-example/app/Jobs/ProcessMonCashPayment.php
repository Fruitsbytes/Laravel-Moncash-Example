<?php

namespace App\Jobs;

use App\Events\PaymentProcessed;
use App\Facades\MonCash\API;
use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessMonCashPayment implements ShouldQueue
{

    public Payment|null $payment;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public string|int $transactionId)
    {
    }

    /**
     * Get the middleware the job should pass through.
     *
     * @return array
     */
    public function middleware()
    {
        return [(new WithoutOverlapping($this->transactionId))->expireAfter(180)];
    }


    public function handle()
    {
        $this->payment = Payment::where('transactionID', '=',$this->transactionId)->first();

        if (
            empty($this->payment) ||
            (
                $this->payment->message !== 'successful' &&
                ! str_starts_with($this->payment->message, 'Error: ')
            )
        ) {
            $remotePaymentRaw = API::getRawTransaction($this->transactionId);

            if ($remotePaymentRaw->successful()) {
                $remotePayment = API::rawToPayment($remotePaymentRaw);
                $this->payment = Payment::where('orderID', '=', $remotePayment->orderID)->first();

                $this->payment->merge($remotePayment);
            }

            if (isset($remotePaymentRaw['error']) || isset($remotePaymentRaw['error_description'])) {
                $errorMessage = $remotePaymentRaw['message'] ??  $remotePaymentRaw['error_description'];
                $this->payment->message = 'Error: ' .  $errorMessage;
                $this->payment->update();
            }

            PaymentProcessed::dispatch($this->transactionId);
        }
    }

}

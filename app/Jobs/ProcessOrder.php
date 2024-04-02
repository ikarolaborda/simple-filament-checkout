<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Stripe\PaymentIntent;

class ProcessOrder implements ShouldQueue
{
    protected $paymentIntent;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(PaymentIntent $paymentIntent)
    {
        $this->paymentIntent = $paymentIntent;
    }

    public function handle(): void
    {
        $metadata = $this->paymentIntent->metadata;
        $amount   = $this->paymentIntent->amount_received;

        Order::create([
            'product_id' => $metadata->product_id,
            'user_id'    => $metadata->user_id,
            'amount'     => $amount,
        ]);
    }
}

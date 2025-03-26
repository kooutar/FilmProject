<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    protected $provider;

    public function __construct(PayPalClient $provider)
    {
        $this->provider = $provider;
    }

    public function createPayment(Request $request)
    {
        $data = [
            "intent" => "sale",
            "payer" => [
                "payment_method" => "paypal"
            ],
            "transactions" => [
                [
                    "amount" => [
                        "total" => "10.00",
                        "currency" => "USD"
                    ],
                    "description" => "Test Payment"
                ]
            ],
            "redirect_urls" => [
                "return_url" => route('payment.status'),
                "cancel_url" => route('payment.cancel')
            ]
        ];

        $payment = $this->provider->createPayment($data);
        
        if ($payment['state'] == 'created') {
            return redirect($payment['links'][1]['href']); 
        }

        return response()->json($payment);
    }

    public function paymentStatus(Request $request)
    {
        $paymentId = $request->get('paymentId');
        $payerId = $request->get('PayerID');

        $payment = $this->provider->getPaymentDetails($paymentId);

        $execution = $this->provider->executePayment($paymentId, $payerId);

        if ($execution['state'] == 'approved') {
         
            return response()->json(['status' => 'Payment Successful']);
        }

        return response()->json(['status' => 'Payment Failed']);
    }

    public function paymentCancel()
    {
        
        return response()->json(['status' => 'Payment Cancelled']);
    }
}


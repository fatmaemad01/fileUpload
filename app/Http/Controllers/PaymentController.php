<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscrpitionRequest;
use Error;
use App\Models\Payment;
use Stripe\StripeClient;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Services\Payments\StripePayments;

class PaymentController extends Controller
{

    public function create(StripePayments $stripe , Subscription $subscription)
    {
          return $stripe->createCheckoutSession($subscription);

    }


    public function store(CreateSubscrpitionRequest $request)
    {
        $subscription = Subscription::findOrFail($request->subscription_id);

        $stripe = new StripeClient(config('services.stripe.secret_key'));
        try {
            $paymentIntent = $stripe->paymentIntents->create([
                'amount' => $subscription->price * 100,
                'currency' => 'usd',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);

            return [
                'clientSecret' => $paymentIntent->client_secret,
            ];
        } catch (Error $e) {
            return Response::json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function success(Subscription $subscription)
    {
        return view( 'success' , compact('subscription'));
    }


    public function cancel(Subscription $subscription)
    {
        return view('cancel' , compact('subscription'));
    }
}

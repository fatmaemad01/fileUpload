<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Actions\CreateSubscrpition;
use App\Http\Requests\CreateSubscrpitionRequest;

class SubscriptionsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => ['required', 'int'],
        ]);

        $plan = Plan::findOrFail($request->post('plan_id'));

        $months = $request->post('period');

        $subscription = Subscription::create([
            'plan_id' => $plan->id,
            'user_id' => $request->user()->id,
            'price' => $plan->price * $months,
            'expires_at' => now()->addMonths($months),
            'status' => 'pending',
        ]);

        return redirect()->route('checkout', $subscription->id);
    }
}

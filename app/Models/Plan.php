<?php

namespace App\Models;

use App\Concerns\HasPrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory , HasPrice;

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'plan_features')
            ->withPivot(['feature_value']);
    }

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class , 'subscriptions');
    }
}

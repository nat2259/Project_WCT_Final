<?php

// app/Models/Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'billing_detail_id',
        'total_amount',
        'status',
        'payment_method',
    ];

    public function billingDetail()
    {
        return $this->belongsTo(BillingDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

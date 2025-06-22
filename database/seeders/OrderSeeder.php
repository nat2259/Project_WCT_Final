<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\BillingDetail;
use App\Models\User;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $billing = BillingDetail::first();

        Order::create([
            'user_id' => $user->id,
            'billing_detail_id' => $billing->id,
          //  'total_price' => 59.99,
            'payment_method' => 'paypal',
            'status' => 'pending',
        ]);
    }
}

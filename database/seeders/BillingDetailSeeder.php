<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BillingDetail;
use App\Models\User;

class BillingDetailSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first(); // Use first user

        BillingDetail::create([
            'user_id' => $user->id,
            'first_name' => 'Sreytin',
            'last_name' => 'Men',
            'country' => 'Cambodia',
            'street_address' => 'St 100',
            'apartment' => 'Room 5',
            'city' => 'Phnom Penh',
            'postcode' => '12000',
            'phone' => '010123456',
            'email' => 'sreytin@example.com',
        ]);
    }
}

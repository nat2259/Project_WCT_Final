<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
                'first_name' => 'Test',
                'last_name' => 'User',
              /// 'name' => 'User',
                'email' => 'test@example.com',
                'password' => bcrypt('password123'),
        ]);
        $this->call([
            BillingDetailSeeder::class,
            OrderSeeder::class,
            CategorySeeder::class,

            
        ]);
    
    }
}

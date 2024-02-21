<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reward;

class RewardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reward::create(['name' => 'Free Coffee', 'points' => 50]);
        Reward::create(['name' => 'Discount Coupon', 'points' => 100]);
    }
}

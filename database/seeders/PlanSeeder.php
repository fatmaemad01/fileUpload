<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::insert([
            [
                'name' => 'Free ',
                'price' => 0,
                'featured' => 0,
            ],
            [
                'name' => 'Pro ',
                'price' => 1000,
                'featured' => 1,
            ],
            [
                'name' => 'Premium',
                'price' => 1900,
                'featured' => 0,
            ]
        ]);

        Feature::insert([
            [
                'name' => 'Storage Size',
                'code' => 'max-size',
            ],

        ]);

        DB::table('plan_features')->insert([
            ['plan_id' => 1, 'feature_id' => 1, 'feature_value' => 2],
            ['plan_id' => 2, 'feature_id' => 1, 'feature_value' => 20],
            ['plan_id' => 3, 'feature_id' => 1, 'feature_value' => 100],
        ]);
    }
}

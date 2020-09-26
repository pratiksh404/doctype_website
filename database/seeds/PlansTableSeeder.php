<?php

use doctype_admin\Website\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /* Run Seeder */
    public function run()
    {
        $plans = [
            [
                'plan_name' => 'Basic Plan',
                'plan_period' => 5,
                'plan_price' => 10,
                'plan_currency_symbol' => '$',
                'plan_color' => '#33ccff',
                'plan_services' => '["Service 1", "Service 2"]'
            ],
            [
                'plan_name' => 'Premium Plan',
                'plan_period' => 5,
                'plan_price' => 30,
                'plan_currency_symbol' => '$',
                'plan_color' => '#1257E1',
                'plan_services' => '["Service 1", "Service 2"]'
            ],
        ];

        foreach ($$plans as $plan) {
            Plan::create($plan);
        }
    }
}

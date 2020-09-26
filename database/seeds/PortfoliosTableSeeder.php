<?php

use doctype_admin\Website\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfoliosTableSeeder extends Seeder
{
    /* Run Seeder */
    public function run()
    {
        $portfolios = [
            [
                'portfolio' => 'nature',
                'portfolio_description' => 'Nature Portfolio'
            ],
            [
                'portfolio' => 'sports',
                'portfolio_description' => 'Sports Portfolio'
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}

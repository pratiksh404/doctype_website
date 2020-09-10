<?php

use doctype_admin\Website\Models\Counter;
use Illuminate\Database\Seeder;

class CountersTableSeeder extends Seeder
{
    /**
     *
     *Counter Table Data Population
     *
     *@return void
     *
     */
    public function up()
    {
        $counters = [
            [
                "counter_name" => 'Completed Projects',
                "count" => 283,
                "counter_icon" => 'fa fa-trophy'
            ],
            [
                "counter_name" => 'Happy Client',
                "count" => 256,
                "counter_icon" => 'fa fa-smile'
            ],
            [
                "counter_name" => 'Cup of Coffes',
                "count" => 1089,
                "counter_icon" => 'fa fa-coffee'
            ],
        ];

        foreach ($counters as $counter) {
            Counter::create($counter);
        }
    }
}

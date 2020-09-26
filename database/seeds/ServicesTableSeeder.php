<?php

use doctype_admin\Website\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /* Run Seeder */
    public function run()
    {
        $services = [
            [
                'service_name' => 'Admin Starter Kit',
                'service_excerpt' => 'What we need when we start every project ? Basic auth
entication system, managing authenticated users and having them assigned to some
 role and observing their activities ofcourse. Well it handles that all',
                'service_redirect_link' => '',
                'service_icon' => 'fa fa-rocket'
            ],
            [
                'service_name' => 'Plugins',
                'service_excerpt' => 'Backend and frontend plugins for our lazy developers',
                'service_redirect_link' => '',
                'service_icon' => 'fa fa-plug'
            ],
            [
                'service_name' => 'Support',
                'service_excerpt' => 'Great community support',
                'service_redirect_link' => '',
                'service_icon' => 'fa fa-globe'
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}

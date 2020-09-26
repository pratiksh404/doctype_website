<?php

use doctype_admin\Website\Models\Faq;
use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /* Run Seeder */
    public function run()
    {
        $faqs = [
            [
                'question' => 'What is Doctype Admin Panel',
                'answer' => 'Laravel Admin Panel for lazy developers. Contains User Management, Roles and Permission Management, Activity Logging and integratable packages'
            ],
            [
                'question' => 'What is Doctype Admin Website Package',
                'answer' => 'Laravel Admin Panel Website Starter Kit'
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}

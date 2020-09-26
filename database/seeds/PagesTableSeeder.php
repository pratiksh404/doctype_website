<?php

use Illuminate\Database\Seeder;
use doctype_admin\Website\Models\Page;

class PagesTableSeeder extends Seeder
{
    /* Run Seeding */
    public function run()
    {
        $pages = [
            [
                'title' => 'About Us',
                'body' => 'This is about us',
                'meta_title' => 'Doctype Admin About Page',
                'meta_keywords' => 'doctype_admin,about',
                'meta_description' => 'Doctype Admin About Page',
                'meta_image' => '',
            ],
            [
                'title' => 'Contact Us',
                'body' => 'This is Contact us',
                'meta_title' => 'Doctype Admin Contact Page',
                'meta_keywords' => 'doctype_admin,ontact',
                'meta_description' => 'Doctype Admin Contact Page',
                'meta_image' => '',
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}

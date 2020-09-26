<?php

use Illuminate\Database\Seeder;
use doctype_admin\Website\Models\Team;

class TeamsTableSeeder extends Seeder
{
    public function run()
    {
        $teams = [
            [
                'name' => 'Batman',
                'designation' => 'CEO',
                'description' => 'He is the boss',
                'phone_no' => '["8542369852", "4521589632"]',
                'image' => '',
                'social_media' => '[{"id": "0", "url": "https://www.facebook.com/doctypenepal", "icon": "fab fa-facebook", "name": "Facebook"}, {"id": "1", "url": "https://github.com/pratiksh404", "icon": "fab fa-github", "name": "Github"}]'
            ],
            [
                'name' => 'Taylor Otwell',
                'designation' => 'Founder',
                'description' => 'He is awesome',
                'phone_no' => '["8542369852", "4521589632"]',
                'image' => '',
                'social_media' => '[{"id": "0", "url": "https://www.facebook.com/doctypenepal", "icon": "fab fa-facebook", "name": "Facebook"}, {"id": "1", "url": "https://github.com/pratiksh404", "icon": "fab fa-github", "name": "Github"}]'
            ],
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}

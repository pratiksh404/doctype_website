<?php

use Illuminate\Support\Facades\Route;

Route::resources([
    'counter' =>  'CounterController',
    'team' =>  'TeamController',
    'page' =>  'PageController',
    'portfolio' =>  'PortfolioController',
    'image' =>  'ImageController',
    'service' =>  'ServiceController',
    'plan' =>  'PlanController',
    'faq' =>  'FaqController',
    'project' => 'ProjectController'
]);

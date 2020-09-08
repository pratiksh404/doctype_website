<?php

use Illuminate\Support\Facades\Route;

Route::resource('/counter', 'CounterController');

Route::resource('/team', 'TeamController');

Route::resource('/page', 'PageController');

Route::resource('/portfolio', 'PortfolioController');

Route::resource('/image', 'ImageController');

Route::resource('/service', 'ServiceController');

Route::resource('/plan', 'PlanController');

Route::resource('/faq', 'FaqController');

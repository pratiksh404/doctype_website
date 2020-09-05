<?php

use Illuminate\Support\Facades\Route;

Route::resource('/counter', 'CounterController');

Route::resource('/team', 'TeamController');

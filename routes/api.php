<?php

use Illuminate\Support\Facades\Route;

/* ================================Pages API================================ */

Route::get('/page', 'APIPageController@index');
Route::get('/page/{page}', 'APIPageController@show');
/* ========================================================================= */

/* ================================Counters API================================ */
Route::get('/counter', 'APICounterController@index');
Route::get('/counter/{counter}', 'APICounterController@show');
/* ========================================================================= */

/* ================================FAQ API================================ */
Route::get('/faq', 'APIFaqController@index');
Route::get('/faq/{faq}', 'APIFaqController@show');
/* ========================================================================= */

/* ================================Image API================================ */
Route::get('/image', 'APIImageController@index');
Route::get('/image/{image}', 'APIImageController@show');
/* ========================================================================= */

/* ================================Plan API================================ */
Route::get('/plan', 'APIPlanController@index');
Route::get('/plan/{plan}', 'APIPlanController@show');
/* ========================================================================= */

/* ================================Portfolio API================================ */
Route::get('/portfolio', 'APIPortfolioController@index');
Route::get('/portfolio/{portfolio}', 'APIPortfolioController@show');
/* ========================================================================= */

/* ================================Service API================================ */
Route::get('/service', 'APIServiceController@index');
Route::get('/service/{service}', 'APIServiceController@show');
/* ========================================================================= */

/* ================================Team API================================ */
Route::get('/team', 'APITeamController@index');
Route::get('/team/{team}', 'APITeamController@show');
/* ========================================================================= */

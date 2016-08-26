<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
	return $app->version();
});

$app->group(['prefix' => 'auth', 'namespace' => '\App\Http\Controllers'], function () use ($app) {
	
	$app->post('/signin', 'AuthController@signin');
	$app->put('/signout', 'AuthController@signout');
	$app->put('/refresh', 'AuthController@refresh');
	
});

$app->group(['prefix' => 'app', 'middleware' => 'auth', 'namespace' => '\App\Http\Controllers'], function () use ($app) {
	
	$app->post('/create', 'AppController@create');
	$app->get('/listing', 'AppController@listing');
	
});
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


// Do Need
$app->get('/', function () use ($app) {
  $res['success'] = true;
  $res['result'] = "Hello there - Welcome to our exam project";
  return response($res);
});

$app->post('/login', 'LoginController@index');
$app->post('/register', 'UserController@register');
$app->get('/user/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@get_user']);

/*
 | ------------------------------------------
 | CRUD Routes using auth middleware
 | ------------------------------------------
 */

/* Route category ads */
$app->get('/shops', 'ShopsController@index');
$app->get('/shops/{id}', 'ShopsController@read');
$app->get('/shops/delete/{id}', 'ShopsController@delete');
$app->post('/shops', 'ShopsController@create');
$app->post('/shops/update/{id}', 'ShopsController@update');


/* Route item ads */
$app->get('/item_ads', 'ItemAdsController@index');
$app->get('/item_ads/{id}', 'ItemAdsController@read');
$app->get('/item_ads/delete/{id}', 'ItemAdsController@delete');
$app->post('/item_ads/create', 'ItemAdsController@create');
$app->post('/item_ads/update/{id}', 'ItemAdsController@update');



/*
 | ------------------------------------------
 | Movie API for entertainment
 | ------------------------------------------
 */
$app->get('/movie', 'MovieController@index');
$app->get('/movie/category/{category_name}', 'MovieController@movie_category');
$app->get('/movie/category_list', 'MovieController@lis_category');
$app->get('/movie/tv_show', 'TvShowController@index');
$app->get('/movie/tv_show/{id_movie}', 'TvShowController@tvshow_movie_id');
$app->get('/movie/tv_show/show/{id}', 'TvShowController@tvshow_id');

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
$app->post('/shops/update/{shopID}', 'ShopsController@update');


/* Route sent campaigns */
$app->get('/sentcampaigns', 'SentCampaignController@index');
$app->get('/sentcampaigns/{id}', 'SentCampaignController@read');
$app->get('/sentcampaigns/delete/{id}', 'SentCampaignController@delete');
$app->post('/sentcampaigns/create', 'SentCampaignController@create');
$app->post('/sentcampaigns/update/{id}', 'SentCampaignController@update');


/* Route sent campaigns */
$app->get('/activecampaigns', 'ActiveCampaignController@index');
$app->get('/activecampaigns/{id}', 'ActiveCampaignController@read');
$app->get('/activecampaigns/delete/{id}', 'ActiveCampaignController@delete');
$app->post('/activecampaigns/create', 'ActiveCampaignController@create');
$app->post('/activecampaigns/update/{id}', 'ActiveCampaignController@update');

/* Route sent campaigns */
$app->get('/expiredcampaigns', 'ExpiredCampaignController@index');
$app->get('/expiredcampaigns/{id}', 'ExpiredCampaignController@read');
$app->get('/expiredcampaigns/delete/{id}', 'ExpiredCampaignController@delete');
$app->post('/expiredcampaigns/create', 'ExpiredCampaignController@create');
$app->post('/expiredcampaigns/update/{id}', 'ExpiredCampaignController@update');

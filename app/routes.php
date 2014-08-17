<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@getIndex']);
Route::get('app', ['as' => 'home.app', 'uses' => 'HomeController@getApp']);


Route::get('getUser/{query}', ['as' => 'data.getUser', 'uses' => 'AppController@getUser']);
Route::get('getRepos/{query}', ['as' => 'data.getRepos', 'uses' => 'AppController@getRepos']);

Route::get('fetchCommits/{owner}/{repo}', ['as' => 'data.fetchCommits', 'uses' => 'AppController@fetchCommits']);
Route::get('analyze/{date}', ['as' => 'data.analyze', 'uses' => 'AppController@analyze']);

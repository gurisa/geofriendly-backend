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

$router->get('/', 'Controller@index');

$router->group(['prefix' => 'api/v1/'], function () use ($router) {

    $router->group([], function () use ($router) {
        $router->group(['prefix' => 'users/[/{id}]'], function () use ($router) {
            //hit users
            $router->post('', 'UserController@create');
            $router->get('', 'UserController@all');
            
            //hit users/{id}
            $router->get('{id}', 'UserController@retrieve');
            $router->patch('{id}', 'UserController@update');
            $router->delete('{id}', 'UserController@delete');
        });
    });

});
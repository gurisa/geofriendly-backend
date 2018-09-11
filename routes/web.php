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

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->group([], function () use ($router) {
        $router->group(['prefix' => 'users'], function () use ($router) {
            //hit users
            $router->get('', 'UserController@all');
            $router->post('', 'UserController@create');
                        
            //hit users/{id}
            $router->get('{id}', 'UserController@retrieve');
            $router->patch('{id}', 'UserController@update');
            $router->delete('{id}', 'UserController@delete');
        });

        $router->group(['prefix' => 'classifications'], function () use ($router) {
            $router->get('', 'ClassificationController@all');
            $router->post('', 'ClassificationController@create');

            $router->get('{id}', 'ClassificationController@retrieve');
            $router->patch('{id}', 'ClassificationController@update');
            $router->delete('{id}', 'ClassificationController@delete');
        });

        $router->group(['prefix' => 'families'], function () use ($router) {
            $router->get('', 'FamilyController@all');
            $router->post('', 'FamilyController@create');

            $router->get('{id}', 'FamilyController@retrieve');
            $router->patch('{id}', 'FamilyController@update');
            $router->delete('{id}', 'FamilyController@delete');
        });
    });

});
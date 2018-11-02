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

$router->group(['middleware' => 'cors'], function () use ($router) { 
    $router->get('', 'Controller@index');

    $router->group(['prefix' => 'api/v1'], function () use ($router) {
        $router->get('', 'Controller@index');
    });
    
    $router->group(['prefix' => 'api/v1'], function () use ($router) {
        $router->group(['prefix' => 'auth'], function () use ($router) {
            $router->post('register', 'UserController@create');
            $router->post('login', 'AuthController@login');
            $router->post('logout', 'AuthController@logout');
        });
    });

    $router->group(['prefix' => 'api/v1', 'middleware' => 'jwt'], function () use ($router) {
        $router->group(['prefix' => 'users'], function () use ($router) {
            $router->get('', 'UserController@all');
            $router->post('', 'UserController@create');

            $router->get('me', 'UserController@me');
            $router->get('{id}', 'UserController@retrieve');
            $router->patch('{id}', 'UserController@update');
            $router->delete('{id}', 'UserController@delete');
        });

        $router->group(['prefix' => 'acquisitions'], function () use ($router) {
            $router->get('', 'AcquisitionController@all');
            $router->post('', 'AcquisitionController@create');

            $router->get('{id}', 'AcquisitionController@retrieve');
            $router->patch('{id}', 'AcquisitionController@update');
            $router->delete('{id}', 'AcquisitionController@delete');
        });

        $router->group(['prefix' => 'ages'], function () use ($router) {
            $router->get('', 'AgeController@all');
            $router->post('', 'AgeController@create');

            $router->get('{id}', 'AgeController@retrieve');
            $router->patch('{id}', 'AgeController@update');
            $router->delete('{id}', 'AgeController@delete');
        });

        $router->group(['prefix' => 'classifications'], function () use ($router) {
            $router->get('', 'ClassificationController@all');
            $router->post('', 'ClassificationController@create');

            $router->get('{id}', 'ClassificationController@retrieve');
            $router->patch('{id}', 'ClassificationController@update');
            $router->delete('{id}', 'ClassificationController@delete');
        });

        $router->group(['prefix' => 'collections'], function () use ($router) {
            $router->get('export', 'CollectionUploadController@export');
            $router->get('import/{id}', 'CollectionUploadController@import');
            $router->post('upload', 'CollectionUploadController@create');


            $router->get('', 'CollectionController@all');
            $router->post('', 'CollectionController@create');

            $router->get('{id}', 'CollectionController@retrieve');
            $router->patch('{id}', 'CollectionController@update');
            $router->delete('{id}', 'CollectionController@delete');
        });

        $router->group(['prefix' => 'drawers'], function () use ($router) {
            $router->get('', 'DrawerController@all');
            $router->post('', 'DrawerController@create');

            $router->get('{id}', 'DrawerController@retrieve');
            $router->patch('{id}', 'DrawerController@update');
            $router->delete('{id}', 'DrawerController@delete');
        });

        $router->group(['prefix' => 'families'], function () use ($router) {
            $router->get('', 'FamilyController@all');
            $router->post('', 'FamilyController@create');

            $router->get('{id}', 'FamilyController@retrieve');
            $router->patch('{id}', 'FamilyController@update');
            $router->delete('{id}', 'FamilyController@delete');
        });

        $router->group(['prefix' => 'islands'], function () use ($router) {
            $router->get('', 'IslandController@all');
            $router->post('', 'IslandController@create');

            $router->get('{id}', 'IslandController@retrieve');
            $router->patch('{id}', 'IslandController@update');
            $router->delete('{id}', 'IslandController@delete');
        });

        $router->group(['prefix' => 'maps'], function () use ($router) {
            $router->get('', 'MapController@all');
            $router->post('', 'MapController@create');

            $router->get('{id}', 'MapController@retrieve');
            $router->patch('{id}', 'MapController@update');
            $router->delete('{id}', 'MapController@delete');
        });

        $router->group(['prefix' => 'racks'], function () use ($router) {
            $router->get('', 'RackController@all');
            $router->post('', 'RackController@create');

            $router->get('{id}', 'RackController@retrieve');
            $router->patch('{id}', 'RackController@update');
            $router->delete('{id}', 'RackController@delete');
        });

        $router->group(['prefix' => 'scales'], function () use ($router) {
            $router->get('', 'ScaleController@all');
            $router->post('', 'ScaleController@create');

            $router->get('{id}', 'ScaleController@retrieve');
            $router->patch('{id}', 'ScaleController@update');
            $router->delete('{id}', 'ScaleController@delete');
        });

        $router->group(['prefix' => 'types'], function () use ($router) {
            $router->get('', 'TypeController@all');
            $router->post('', 'TypeController@create');

            $router->get('{id}', 'TypeController@retrieve');
            $router->patch('{id}', 'TypeController@update');
            $router->delete('{id}', 'TypeController@delete');
        });
    });

});
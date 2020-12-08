<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return redirect('/docs');
});

$router->group(['prefix' => 'v0'], function () use ($router) {
    $router->get('/', function () {
        return redirect('../');
    });

    // Numbers
    $router->group(['prefix' => 'number'], function () use ($router) {
        // Number
        $router->get('/', 'Numbers@number');

        $router->get('/digit', 'Numbers@digit');
        $router->get('/float', 'Numbers@float');

    });

});

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
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function($router){
//    // Articles
//    $router->get('articles', 'ArticleController@showAllArticles');
//    $router->get('articles/{id}', 'ArticleController@showSingleArticle');
//    $router->post('articles', 'ArticleController@create');
//    $router->put('articles/{id}', 'ArticleController@update');
//    $router->delete('articles/{id}', 'ArticleController@delete');

    // Books
    $router->get('books', 'BookController@index');

    // Character
    $router->get('characters', 'CharacterController@index');
    $router->get('characters/filter', 'CharacterController@filter');

    // Comment
    $router->post('comments', 'CommentController@store');

});
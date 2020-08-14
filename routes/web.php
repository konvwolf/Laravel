<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/'], function() {
    Route::get('', 'HomeController@index')->name('Home');
    Route::get('about', 'HomeController@about')->name('About');
});

Route::group([
                'prefix' => 'news',
                'namespace' => 'News'
            ],
    function() {
        Route::get('/', 'NewsController@index')->name('News');
        Route::get('/{id}/', 'NewsController@show')->name('NewsById');
});

Route::group([
                'prefix' => 'categories',
                'namespace' => 'News'
            ],
    function() {
        Route::get('/', 'NewsCategoriesController@index')->name('Categories');
        Route::get('/{id}/', 'NewsCategoriesController@show')->name('CategoryByName');
});
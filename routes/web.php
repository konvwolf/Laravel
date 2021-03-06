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
    Route::match(['get','post'], 'login/', 'HomeController@login')->name('Login');
});

Route::group([
                'prefix'    =>'admin',
                'namespace' =>'Admin',
                'as'        => 'admin.'
            ],
    function() {
        Route::get('/', 'AdminController@index')->name('Admin');
        Route::match(['get', 'post'], '/add-news/', 'AdminController@create')->name('Create-News');
        Route::get('/get-news/', 'AdminController@read')->name('Read-News');
        Route::any('/edit-news/{id}', 'AdminController@update')->name('Update-News');
        Route::get('/delete-news/{id}/', 'AdminController@delete')->name('Delete-News');
    }    
);

Route::group([
                'prefix'    => 'news',
                'namespace' => 'News',
                'as'        => 'news.'
            ],
    function() {
        Route::get('/', 'NewsController@index')->name('News');
        Route::get('/categories/', 'NewsCategoriesController@index')->name('Categories');
        Route::get('/categories/{id}/', 'NewsCategoriesController@show')->name('CategoryByName');
        Route::get('/{id}/', 'NewsController@show')->name('NewsById');
});
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();


Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
    
    Route::get('/home',[
        'uses' => 'HomeController@index',
        'as' => 'admin.home'
    ]);

    Route::get('/post/create',[
        'uses' => 'PostsController@create',
        'as' => 'post.create'
    ]);
    
    Route::post('/post/store',[
        'uses' => 'PostsController@store',
        'as' => 'post.store'
    ]);

    Route::get('/category/create',[
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]); 

    Route::post('/category/store',[
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);    

});


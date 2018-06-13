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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace' => 'Admin',
              'prefix' => 'admin',
              'middleware' => ['auth.basic', 'auth']], function() {


//    Route::get('/unauthorized', 'HomeController@unauthorized');


    Route::prefix('product')->group(function (){

        Route::post('/', 'ProductController@insert')->name('insert_product');
        Route::post('/{id}', 'ProductController@update');
        Route::get('/edit/{id}', 'ProductController@edit');
        Route::get('/browse', 'ProductController@index');
        Route::get('/create', 'ProductController@create');


    });

});
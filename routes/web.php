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
    return view('npms.site.welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
    

Route::group(['namespace' => 'Admin',
              'prefix' => 'admin',
              'middleware' => ['auth.basic', 'auth']], function() {


//    Route::get('/unauthorized', 'HomeController@unauthorized');

    Route::prefix('brand')->group(function () {

        Route::post('/', 'BrandController@insert');
        Route::post('/{id}/update', 'BrandController@update');
        Route::delete('/{id}', 'BrandController@delete');

        Route::get('/create', 'BrandController@create');
        Route::get('/', 'BrandController@index');
        Route::get('/{id}', 'BrandController@edit');


    });



    Route::prefix('product')->group(function (){

        Route::post('/upload', 'ProductController@upload');


        Route::post('/', 'ProductController@insert')->name('insert_product');
        Route::post('/types', 'ProductTypeController@insert');

        Route::post('/{id}', 'ProductController@update');
        Route::post('/approve/{id}', 'ProductController@approve');

        Route::get('/edit/{id}', 'ProductController@edit');

        Route::get('/browse', 'ProductController@index');
        Route::get('/pending', 'ProductController@pending');
        Route::get('/{type}/search', 'ProductController@search');
//        Route::get('/pending/search', 'ProductController@search');

        Route::get('/import', 'ProductController@import');
        Route::get('/create', 'ProductController@create');

        Route::get('/permissions', 'PermissionController@index');
        Route::post('/global/permissions/', 'PermissionController@insertGlobal');
        Route::post('/global/permissions/{id}/change', 'PermissionController@changeGlobal');
        Route::post('/{productId}/permissions/{id}/change', 'PermissionController@change');

        Route::get('/types', 'ProductTypeController@index');
        Route::get('/types/{id}', 'ProductTypeController@edit');
        Route::post('/types/{id}', 'ProductTypeController@update');
        Route::delete('/types/{id}', 'ProductTypeController@delete');


    });

    Route::prefix('question')->group(function () {

        Route::post('/', 'QuestionController@insert');
        Route::post('/{id}', 'QuestionController@update');
        Route::delete('/{id}', 'QuestionController@delete');

        Route::get('/create', 'QuestionController@create');
        Route::get('/', 'QuestionController@index');
        Route::get('/{id}', 'QuestionController@show');
        Route::get('/edit/{id}', 'QuestionController@edit');


    });

    Route::prefix('answer')->group(function () {

        Route::post('/', 'AnswerController@insert');
        Route::post('/{id}', 'AnswerController@update');
        Route::delete('/{id}', 'AnswerController@delete');
        Route::delete('/{id}/{labelId}', 'AnswerController@detachLabel');

//        Route::get('/create', 'QuestionController@create');
//        Route::get('/', 'QuestionController@index');
//        Route::get('/{id}', 'QuestionController@show');
//        Route::get('/edit/{id}', 'QuestionController@edit');


    });

    Route::prefix('label')->group(function () {

        Route::post('/', 'LabelController@insert');
        Route::post('/{id}', 'LabelController@update');
        Route::post('/answer/pivot', 'LabelController@addAnswer');

        Route::delete('/{id}', 'LabelController@delete');

        Route::get('/create', 'LabelController@create');
        Route::get('/', 'LabelController@index');
        Route::get('/list', 'LabelController@getList');
        Route::get('/{id}', 'LabelController@show');
        Route::get('/edit/{id}', 'LabelController@edit');
        Route::get('/sync/{id}', 'LabelController@sync');


    });

});
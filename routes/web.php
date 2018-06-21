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

Route::get('test', function (){

    $string = "Aqua/Water/Eau, Dicaprylyl carbonate (coconut, based), Cetearyl alcohol (vegetable, based), Glycerin [vegetable, glycerine], Cocoglycerides (coconut based), Butyrospermum parkii (Shea butter), Glyceryl stearate (naturally derived), Cetearyl glucoside (derived from corn sugar), Rhus verniciflua peel wax (Berry wax), Theobroma cacoa (Cocoa butter), Kigelia africana fruit extract (Kigelia africana), Hibiscus sabdariffa flower extract, Adansonia digitata fruit extract (Baobab), Lactose (probiotic bifidoculture milk extract), Lactis proteinum/Milk protein/Protéine du lait (probiotic protein), Bifida ferment lysate (probiotic culture), Schinziophyton Rautanenii kernel (Mongongo) oil, Panthenol (Pro-vitamin B5), Sodium ascorbyl phosphate (Vitamin C), Rosmarinus officinalis leaf (Rosemary) oil, Citrus aurantium bergamia peel (Bergamot) oil, Anthemis nobilis (Chamomile) oil, Eucalyptus globulus leaf (Eucalyptus) oil, Xanthan gum (naturally derived), Sodium stearoyl glutamate (naturally derived), Tocopheryl acetate (Vitamin E), Citric acid (derived from Lemon), Hydroxyacetophenone (preservative booster), Benzyl alcohol, Dehydroacetic acid (natural association approved preservative), Limonene*, Linalool* ";

    $string = str_replace("[", "(", $string);
    $string = str_replace("]", ")", $string);

    dd(preg_split('~,(?![^()]*\))~', $string));
//    dd(explode(',', $string));

});


Route::group(['namespace' => 'Admin',
              'prefix' => 'admin',
              'middleware' => ['auth.basic', 'auth']], function() {


//    Route::get('/unauthorized', 'HomeController@unauthorized');


    Route::prefix('product')->group(function (){

        Route::post('/upload', 'ProductController@upload');


        Route::post('/', 'ProductController@insert')->name('insert_product');
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

    Route::prefix('label')->group(function () {

        Route::post('/', 'LabelController@insert');
        Route::post('/{id}', 'LabelController@update');
        Route::delete('/{id}', 'LabelController@delete');

        Route::get('/create', 'LabelController@create');
        Route::get('/', 'LabelController@index');
        Route::get('/{id}', 'LabelController@show');
        Route::get('/edit/{id}', 'LabelController@edit');
        Route::get('/sync/{id}', 'LabelController@sync');


    });

});
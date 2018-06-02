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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/quickreg','Auth\RegisterController@showRegistrationForm');



Route::get('/search','SearchController@show');
Route::get('/products/json','SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show');
Route::get('/categories/{category}','CategoryController@show');



Route::post('/cart','CartDetailController@store');
Route::delete('/cart','CartDetailController@destroy');
Route::post('/order', 'CartController@update');



Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/products','ProductController@index');
    Route::get('/products/create','ProductController@create');
    Route::post('/products','ProductController@store');
    Route::get('/products/{id}/edit','ProductController@edit');
    Route::post('/products/{id}/edit','ProductController@update');
    Route::post('/products/{id}/delete','ProductController@destroy');

    Route::get('/products/{id}/images','ImageController@index'); //listar imagenes
    Route::post('/products/{id}/images','ImageController@store');
    Route::delete('/products/{id}/images','ImageController@destroy');
    Route::get('/products/{id}/images/select/{image}','ImageController@select'); //destacar



    Route::get('/categories','CategoryController@index');
    Route::get('/categories/create','CategoryController@create');  //creando masivamente
    Route::post('/categories','CategoryController@store');
    Route::get('/categories/{category}/edit','CategoryController@edit');  //editando masivamente
    Route::post('/categories/{category}/edit','CategoryController@update');  //editando masivamente
    Route::post('/categories/{category}/delete','CategoryController@destroy');
});



//Route::delete('/admin/products/{id}','ProductController@destroy');  metodo delete



/*<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-instagram"></i></a>
                    <a href="#pablo" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-facebook-square"></i></a>*/
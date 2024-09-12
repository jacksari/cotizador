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

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
//    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_WARNING);
}

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index');

Route::get('/showpdf/{id}', 'HomeController@showpdf');

Route::get('/show/{id}', 'HomeController@show');

Route::get('/edit/{id}', 'HomeController@edit');

Route::get('/create', 'HomeController@create');

Route::post('/store', 'HomeController@store');

Route::get('/cotizacion/{id}', 'HomeController@cotizacion');

Route::get('getmodelos/{id}','HomeController@getModelosByMarcaId');

Route::get('getmodelo/{id}','HomeController@getModelo');

Route::get('getproducto/{modelos_id}/{companias_id}/{usos_id}','HomeController@getModeloProducto');

//Route::get('/admin/alertconfig', 'HomeController@alertconfig');
Route::get('/admin/alertconfig', 'AdminCotizacionesController@alertconfig');

Route::post('/admin/storeconfig', 'AdminCotizacionesController@storeconfig');

//Route::get('/cotizacion', function () {
//    return view('cotizacion');
//});

Route::get('/sendmail', 'HomeController@sendattachexample');

Route::post('/send', 'HomeController@send');

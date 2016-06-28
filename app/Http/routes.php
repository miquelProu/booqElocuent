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

Route::get('welcome', 'WelcomeController@index');
Route::get('home', 'WelcomeController@index');

Route::get('/', 'MainController@index');

Route::get('detail/{id}', 'MainController@detail');

Route::get('inside/{id}', 'MainController@inside');

Route::get('about', 'AboutController@index');

Route::get('contact', 'ContactController@index');

Route::get('catalogues', 'CataloguesController@index');

// CART

Route::get('cart', 'CartController@index');

Route::get('cart/{id}', 'CartController@add');

Route::get('remove/{id}', 'CartController@remove');

Route::get('cartDetail', 'CartController@cartDetail');

Route::get('changeShipping/{shiping}', 'CartController@changeShipping');

Route::get('intranet', 'IntranetController@index');

// Rutas de autenticación...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

//Route::get('login', 'Autentificacion@formularioLogin');

// SHIPING OLD

//Route::get('shipping', 'MainController@shipping');
//
//Route::get('setShipping/{value}', 'MainController@setShipping');

//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);

//Route::get('auth',['before'=>'auth','uses'=>'Autentificacion@formularioLogin']);

//
//// Validamos los datos de inicio de sesión.
//Route::post('login', 'Autentificacion@validaLogin');
//
//// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
//Route::group(array('before' => 'auth'), function()
//{
//	// Esta será nuestra ruta de bienvenida.
//	Route::get('/', 'Accion@index');
//	Route::get('logout', 'Autentificar@logOut');
//});

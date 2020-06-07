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

Route::get('/', 'HomeController@dashboard');

Route::group(['middleware' => 'roles','roles' => [1]], function () {
	Route::get('familles', 'FamilleController@index');
	Route::get('familles/getDT', 'FamilleController@getDT');
	Route::get('familles/getDT/{selected}', 'FamilleController@getDT');
	Route::get('familles/get/{id}','FamilleController@get');
	Route::get('familles/getTab/{id}/{tab}','FamilleController@getTab');
	Route::get('familles/add','FamilleController@formAdd');
	Route::post('familles/add','FamilleController@add');
	Route::post('familles/edit','FamilleController@edit');
	Route::get('familles/delete/{id}','FamilleController@delete');
});
Route::group(['middleware' => 'roles','roles' => [1]], function () {
	Route::get('articles', 'ArticleController@index');
	Route::get('articles/getDT', 'ArticleController@getDT');
	Route::get('articles/getDT/{selected}', 'ArticleController@getDT');
	Route::get('articles/get/{id}','ArticleController@get');
	Route::get('articles/getTab/{id}/{tab}','ArticleController@getTab');
	Route::get('articles/add','ArticleController@formAdd');
	Route::post('articles/add','ArticleController@add');
	Route::post('articles/edit','ArticleController@edit');
	Route::get('articles/delete/{id}','ArticleController@delete');
});

Auth::routes();

Route::get('home', 'HomeController@dashboard')->name('home');
Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/verifyBySMS', 'VerifyController@getVerify');
Route::post('/verifyBySMS', 'VerifyController@postVerify');



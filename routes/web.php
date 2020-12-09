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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
// Route::get('/','RestoController@index')->name('home');
Route::get('/home','RestoController@index')->name('home');
Route::get('/login','RestoController@login')->name('login');
Route::get('/list','RestoController@list')->name('list');
Route::view('/signin','signin');
Route::view('/signup','signup');
Route::view('/add','add');
Route::view('/search','search');
Route::view('/forget','forget');
Route::post('/checkForget','RestoController@checkForget')->name('checkForget');
Route::get('/signout','RestoController@signout')->name('signout');
Route::post('/data','RestoController@data')->name('data');
Route::post('/registor','RestoController@registor')->name('registor');
Route::post('/checkLogin','RestoController@checkLogin')->name('checkLogin');
Route::post('/search','RestoController@search')->name('search');
Route::post('update','RestoController@update')->name('update');
Route::post('delete','RestoController@delete')->name('delete');
Route::post('FinalUpdate','RestoController@FinalUpdate')->name('FinalUpdate');
// Route::post()->name();



// Auth::routes();

// Route::get('/home', 'HomeController@home')->name('home');

// Auth::routes();

// Route::get('/home', function() {
//    return view('home');
// })->name('home')->middleware('home');

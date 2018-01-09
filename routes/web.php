<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider withidn a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/secret', function () {
    return view('CREATEONLY');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');


//Route::get('/default', function () {
 //   return view('default');
//});
//Route::resource('itemCRUD','ItemCRUDController');

//Route::get('homeCRUD','HomeController@index1');
Route::get('purchase','HomeController@insert');
Route::get('edit/{id}','HomeController@show');
Route::post('edit/{id}','HomeController@edit');
Route::get('delete/{id}','HomeController@destroy');
// Route::get('search','HomeController@searchdate');
Route::get('select/{id}','HomeController@select');
Route::get('auth/register', 'HomeController@createuser');

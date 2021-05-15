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


/*
 * Outlets Routes
 */
Route::get('/home', 'OutletMapController@index')->name('home');
Route::resource('outlets','OutletController',);
Route::resource('navettes','NavetteController',);
Route::resource('chauffeurs','ChauffeurController',);

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::group(['middleware' => 'auth'],function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/buildings', 'BuildingController@index');
    Route::get('/building/details/{id}', 'BuildingController@details');
    Route::get('/building/new', 'BuildingController@new');
    Route::post('/building_create', 'BuildingController@create')->name('building.create');
    Route::post('/building_update', 'BuildingController@update')->name('building.update');
    Route::post('/building_delete', 'BuildingController@delete')->name('building.delete');

    Route::get('/owners', 'OwnerController@index');
    Route::get('/owner/details/{id}', 'OwnerController@details');
    Route::get('/owner/new', 'OwnerController@new');
    Route::post('/owner_create', 'OwnerController@create')->name('owner.create');
    Route::post('/owner_update', 'OwnerController@update')->name('owner.update');
    Route::post('/owner_delete', 'OwnerController@delete')->name('owner.delete');
});

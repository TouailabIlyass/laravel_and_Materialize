<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('cves/{limit?}','CveController@list');
Route::post('cves','CveController@save');
Route::get('cve/{id}/edit','CveController@edit');
Route::put('cve/{id}','CveController@update');
Route::delete('cve/{id}','CveController@delete');
Route::get('rest/{max?}','CveController@getData');
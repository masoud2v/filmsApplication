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

Auth::routes();
Route::get('/films', 'FilmsController@index')->name('films');
Route::get('{slug}', ['as' => 'films.show', 'uses' => 'FilmsController@show']);
Route::get('/', function () {
    return redirect('/films');
})->name('home');

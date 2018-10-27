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
Route::get('/home', function () {
    return redirect('/films');
});
Route::get('/films', 'FilmsController@index')->name('films');
Route::get('{slug}', ['as' => 'films.show', 'uses' => 'FilmsController@show']);
Route::get('/', function () {
    return redirect('/films');
})->name('home');
Route::get('/films/create', ['as' => 'films.create', 'uses' => 'FilmsController@create']);
Route::post('store', ['as' => 'films.store', 'uses' => 'FilmsController@store']);
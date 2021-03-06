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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login','Auth\LoginController@loginForm');
Route::middleware('admin')->prefix('admin')->group(function(){
  Route::resource('series','SeriesController');
  Route::resource('{series_by_id}/lessons','LessonController');
});
Route::get('/logout',function(){
  auth()->logout();
});

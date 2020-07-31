<?php

use App\Post;
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

Route::get('toBase', 'TipsTrickController@toBase');

Route::get('whereColumn', 'TipsTrickController@whereColumn');

Route::get('whereGrouping', 'TipsTrickController@whereGrouping');

Route::get('whereX', 'TipsTrickController@whereX');

Route::get('whereSubQuery', 'TipsTrickController@whereSubQuery');

Route::get('queryScope', 'TipsTrickController@queryScope');

Route::get('conditionalAggregates', 'TipsTrickController@conditionalAggregates');

Route::get('/post', 'TipsTrickController@obj');

Route::resource('posts', 'PostController');
Route::get('posts/{id}/delete', 'PostController@destroy')->name('posts.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

// use App\Http\Middleware\HelloMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', 'HelloController@index');
// Route::post('hello', 'HelloController@post');
Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');
// ->middleware(HelloMiddleware::class);

Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');

Route::get('hello/del', 'HelloController@del');
Route::post('hello/del', 'HelloController@remove');

Route::get('hello/show', 'HelloController@show');


//person
Route::get('person', 'PersonController@index');

//personfind
Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');

//personadd
Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');

//personupdate
Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');
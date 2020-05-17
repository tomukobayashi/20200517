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

//表データの追加
Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');
// ->middleware(HelloMiddleware::class);

//表データの更新
Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');

//表データの削除
Route::get('hello/del', 'HelloController@del');
Route::post('hello/del', 'HelloController@remove');

//Authのルート
Auth::routes();

// Route::get('hello/show', 'HelloController@show');

// //person
// Route::get('person', 'PersonController@index');

// //personfind
// Route::get('person/find', 'PersonController@find');
// Route::post('person/find', 'PersonController@search');

// //personadd
// Route::get('person/add', 'PersonController@add');
// Route::post('person/add', 'PersonController@create');

// //personupdate
// Route::get('person/edit', 'PersonController@edit');
// Route::post('person/edit', 'PersonController@update');

// //persondelete
// Route::get('person/del', 'PersonController@delete');
// Route::post('person/del', 'PersonController@remove');

// //board
// Route::get('board', 'BoardController@index');

// //boardadd
// Route::get('board/add', 'BoardController@add');
// Route::post('board/add', 'BoardController@create');


// //rest
// Route::resource('rest', 'RestappController');
// Route::get('hello/rest', 'HelloController@rest');

// //hellosession
// Route::get('hello/session', 'HelloController@ses_get');
// Route::post('hello/session', 'HelloController@ses_put');

// //auth
// Route::get('hello/auth', 'HelloController@getAuth');
// Route::post('hello/auth', 'HelloController@postAuth');

// Route::get('/home', 'HomeController@index')->name('home');
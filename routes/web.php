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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/books', 'CreateController@books');
Route::get('/newbook', function () {
    return view('newbook');
});
Route::post('/insert', 'CreateController@add');
Route::get('/read/{id}', 'CreateController@read');
Route::post('/newcopy', 'CreateController@newcopy');
Route::post('/search', 'CreateController@search');
Route::get('/professor-possessions', 'CreateController@prof');
Route::get('/newbookprof', function() {
	return view('newbookprof');
});
Route::get('/profread/{id}', 'CreateController@profread');
Route::post('/insertprof', 'CreateController@addprof');
Route::post('/profsearch', 'CreateController@profsearch');
Route::get('/journals', 'CreateController@journals');
Route::get('/journalread/{id}', 'CreateController@journalread');
Route::get('/newjournal', function() {
	return view('newjournal');
});
Route::post('/insertjournal', 'CreateController@addjournal');
Route::post('/journalsearch', 'CreateController@journalsearch');
Route::get('/', 'CreateController@news');
Route::get('/newnews', function() {
	return view('newnews');
});
Route::post('/insertnews', 'CreateController@addnews');
Route::get('/newsread/{id}', 'CreateController@newsread');
Route::post('/newssearch', 'CreateController@newssearch');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/panel', function() {
	return view('panel');
});

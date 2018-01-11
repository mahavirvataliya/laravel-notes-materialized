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

Route::get('/', 'NotesController@index');
Route::get('/home', 'NotesController@index');
Route::get('create', 'NotesController@create');
Route::post('create', 'NotesController@store');
Route::get('edit/{note}', 'NotesController@edit');
Route::get('view/{note}', 'NotesController@view');
Route::get('share/{note}', 'NotesController@share');
Route::get('delete/{note}', 'NotesController@delete');
Route::patch('edit/{note}', 'NotesController@update');

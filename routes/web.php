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

Route::get('/', 'PostController@index')->name('home');

// ===== User route ===== //
Route::resource('users', 'UserController');

// ===== permissions route ===== //
Route::resource('permissions',  'PermissionController');

// ===== posts route ===== //
Route::resource('posts', 'PostController');

// ===== roles route ===== //
Route::resource('roles', 'RoleController');

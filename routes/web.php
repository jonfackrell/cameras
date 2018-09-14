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

Route::view('/', 'home');

Route::get('/3d', function(){
    return redirect()->to('https://maclab.byui.edu/3d/');
});

Route::get('/admin', 'AdminController@home')->name('admin');
<?php

/*
|--------------------------------------------------------------------------
| Encryptor Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', 'Auth\LoginEncryptorController@showLoginForm')->name('encryptor.login');
Route::post('/login', 'Auth\LoginEncryptorController@login')->name('encryptor.login.post');
Route::post('/logout', 'Auth\LoginEncryptorController@logout')->name('encryptor.logout');

Route::get('/', 'EncryptorSpace\HomeController@index');
Route::get('/home', 'EncryptorSpace\HomeController@index');

// Encryptor routes here ...

/*
 _  Encryptor profile routes
 */
Route::group(['middleware'=>'encryptor'], function() {
});
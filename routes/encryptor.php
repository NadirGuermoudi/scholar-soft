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
Route::get('/home', 'EncryptorSpace\HomeController@index')->name('encryptor.home');


/*
 _  Encryptor profile routes
 */
Route::group(['middleware'=>'encryptor'], function() {
});

// Encryptor routes here ...

Route::get('codeur-paquets/non-codee','EncryptorSpace\PaquetController@notEncrypted')->name('codeur-paquets.not.encrypted');
Route::get('codeur-paquets/codee','EncryptorSpace\PaquetController@encrypted')->name('codeur-paquets.encrypted');
Route::put('codeur-paquets/prendre/{paquet}','EncryptorSpace\PaquetController@hold')->name('encrypt-paquet.hold');
Route::get('codeur-paquets/encrypt/{paquet}','EncryptorSpace\PaquetController@encrypt')->name('encrypt-paquet.encrypt');
Route::resource('codeur-paquets','EncryptorSpace\PaquetController');
Route::put('codeur-paquets/rendre/{paquet}','EncryptorSpace\PaquetController@return')->name('encrypt-paquet.return');

Route::get('/mails', 'EncryptorSpace\MailsController@index')->name('encryptor.mails');

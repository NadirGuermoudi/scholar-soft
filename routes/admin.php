<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', 'Auth\LoginAdminController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\LoginAdminController@login')->name('admin.login.post');
Route::post('/logout', 'Auth\LoginAdminController@logout')->name('admin.logout');

Route::get('/', 'AdminSpace\HomeController@index');
Route::get('/home', 'AdminSpace\HomeController@index');

// Admin routes here ...


/*
 _  Admin profile routes
 */
Route::group(['middleware'=>'admin'], function() {
});
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

Route::get('/parametres', 'AdminSpace\ParametresController@index')->name('admin.parametres');

route::resource('admin', 'AdminSpace\AdminsController');



/*
 _  Admin profile routes
 */
Route::group(['middleware'=>'admin'], function() {
});

route::resource('salles','AdminSpace\SalleController');

Route::resource('teachers','AdminSpace\TeachersController');

Route::resource('encryptors', 'AdminSpace\EncryptorsController');

Route::resource('etudiants', 'AdminSpace\StudentsController');

Route::resource('groupes', 'AdminSpace\GroupeController');
Route::delete('groupes/{groupe}/{etudiant}', 'AdminSpace\GroupeController@detach')->name('groupes.detach');
Route::get('groupes/{groupe}/addStudents', 'AdminSpace\GroupeController@showAddStudents')->name('groupes.showAddStudents');
Route::get('groupes/{groupe}/addStudents/{etudiant}', 'AdminSpace\GroupeController@addStudent')->name('groupes.addStudent');
Route::post('groupes/{groupe}/addStudents', 'AdminSpace\GroupeController@addStudents')->name('groupes.addStudents');

<?php

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', 'Auth\LoginStudentController@showLoginForm')->name('student.login');
Route::post('/login', 'Auth\LoginStudentController@login')->name('student.login.post');
Route::post('/logout', 'Auth\LoginStudentController@logout')->name('student.logout');

Route::get('/', 'StudentSpace\HomeController@index');
Route::get('/home', 'StudentSpace\HomeController@index');

// Student routes here ...

/*
 _  Student profile routes
 */
Route::group(['middleware'=>'etudiant'], function() {
});
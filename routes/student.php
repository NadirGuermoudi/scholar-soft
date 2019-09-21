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


route::resource('absence', 'StudentSpace\AbsenceController');

Route::get('/emploiDuTemps', [
		'as' => 'emploiDuTemps',
		'uses' => 'StudentSpace\EmploiDuTempsController@index'
	]
);

Route::get('/parametres', 'StudentSpace\ParametresController@index')->name('student.parametres');

route::resource('etudiant', 'StudentSpace\StudentController');



/*
 _  Student profile routes
 */
Route::group(['middleware'=>'etudiant'], function() {
});






<?php

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', 'Auth\LoginTeacherController@showLoginForm')->name('teacher.login');
Route::post('/login', 'Auth\LoginTeacherController@login')->name('teacher.login.post');
Route::post('/logout', 'Auth\LoginTeacherController@logout')->name('teacher.logout');

Route::get('/', 'TeacherSpace\HomeController@index');
Route::get('/home', 'TeacherSpace\HomeController@index');

/*
 _  teacher profile routes
 */
Route::group(['middleware'=>'enseignant'], function() {
	//
});

// Teacher routes here ...

route::resource('seances','TeacherSpace\SeanceController');

Route::get('/parametres', 'TeacherSpace\ParametresController@index')->name('teacher.parametres');

route::resource('enseignant', 'TeacherSpace\TeacherController');


Route::post('fairelappel/ajax', 'TeacherSpace\AbsenceController@ajaxRequestPost')->name('fairelappel.ajax');
Route::post('fairelappel/absence', 'TeacherSpace\AbsenceController@fairlappel')->name('fairelappel.abs');
Route::post('fairelappel/afficher', 'TeacherSpace\AbsenceController@afficher')->name('fairelappel.afficher');
route::resource('fairelappel', 'TeacherSpace\AbsenceController');

route::resource('paquets', 'TeacherSpace\PaquetController');
route::put('paquets/rendre/{paquet}/{correcteur}', 'TeacherSpace\PaquetController@return')->name('paquets.return');
route::get('correct', 'TeacherSpace\PaquetController@correctList')->name('paquets.correct');
route::get('correct/{paquet}/{correcteur}', 'TeacherSpace\PaquetController@correctOneView')->name('paquets.correct.one');
route::post('correct', 'TeacherSpace\PaquetController@correctOne')->name('paquets.correct.one.copy');
route::get('corrected', 'TeacherSpace\PaquetController@corrected')->name('paquets.corrected');
route::get('corrected/{paquet}', 'TeacherSpace\PaquetController@show')->name('paquets.marks');


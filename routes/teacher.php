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
Route::get('/home', 'TeacherSpace\HomeController@index')->name('teacher.home');

/*
 _  teacher profile routes
 */
Route::group(['middleware'=>'enseignant'], function() {
	//
});

// Teacher routes here ...

route::resource('seances','TeacherSpace\SeanceController');

Route::get('/parametres','TeacherSpace\ParametresController@index')->name('teacher.parametres');

route::resource('enseignant','TeacherSpace\TeacherController');

route::resource('paquets','TeacherSpace\PaquetController');
route::put('paquets/rendre/{paquet}/{correcteur}','TeacherSpace\PaquetController@return')->name('paquets.return');
route::get('correct','TeacherSpace\PaquetController@correctList')->name('paquets.correct');
route::get('correct/{paquet}/{correcteur}','TeacherSpace\PaquetController@correctOneView')->name('paquets.correct.one');
route::post('correct','TeacherSpace\PaquetController@correctOne')->name('paquets.correct.one.copy');
route::get('isCorrected','TeacherSpace\PaquetController@corrected')->name('paquets.corrected');
route::get('isCorrected/{paquet}','TeacherSpace\PaquetController@show')->name('paquets.marks');


Route::post('fairelappel/ajax', 'TeacherSpace\AbsenceController@ajaxRequestPost')->name('fairelappel.ajax');
Route::post('fairelappel/absence', 'TeacherSpace\AbsenceController@fairlappel')->name('fairelappel.abs');
Route::post('fairelappel/afficher', 'TeacherSpace\AbsenceController@afficher')->name('fairelappel.afficher');

Route::post('consulterabs/afficher', 'TeacherSpace\ConsulterAbsController@afficherAbs')->name('consultersabs.afficher');
Route::post('consulterabs/justification', 'TeacherSpace\ConsulterAbsController@justifier')->name('consultersabs.justification');
Route::post('consulterabs/AjoutJus', 'TeacherSpace\ConsulterAbsController@ajoutJust')->name('consultersabs.ajoutJust');
Route::post('consulterabs/SuppJus', 'TeacherSpace\ConsulterAbsController@suppJus')->name('consultersabs.suppJust');
Route::get('consulterabs', 'TeacherSpace\ConsulterAbsController@index')->name('consultersabs');

Route::get('consulterexclus', 'TeacherSpace\ConsulterAbsController@indexExclus')->name('consulterexclus');
Route::post('consulterexclus/afficher', 'TeacherSpace\ConsulterAbsController@afficherExclus')->name('consulterexclus.afficher');

route::resource('fairelappel', 'TeacherSpace\AbsenceController');

//Mails
Route::get('/mails', 'TeacherSpace\MailsController@index')->name('teacher.mails');
route::post('/mails/teachers','TeacherSpace\MailsController@teachers')->name('teacher.mails.teachers');
route::post('/mails/students','TeacherSpace\MailsController@students')->name('teacher.mails.students');
route::get('/mails/students','TeacherSpace\MailsController@allStudents')->name('teacher.mails.all.students');
route::get('/mails/teachers','TeacherSpace\MailsController@allTeachers')->name('teacher.mails.all.teachers');

<?php

use Illuminate\Support\Facades\Route;


//FRONT 

//Ruta para la privacidad



Auth::routes();

    // Index
Route::get('/','HomeController@index')->name('home');
Route::get('/privacy','HomeController@privacy')->name('privacy-policy');


    // Parte para editar del usuario logueado 
Route::get('/edit','UserController@config')->name('config');
Route::post('/profile/update','UserController@update_profile')->name('user.update_profile');

    //Para ver el perfil
Route::get('/profile','UserController@profile')->name('user.profile');

    //Para cambiar la contraseña
Route::get('/profile/change-password','UserController@change_password')->name('user.change.password');
Route::post('/profile/changePassword','UserController@changePassword')->name('changePassword');


    // Para del AVATAR 
Route::get('/user/avatar/{filename?}','UserController@getImage')->name('user.avatar');

    // Subir fotos
Route::get('/img-upload','ImageController@create')->name('image.create');


//Parte para acceder a un EXAM

Route::get('/exams/index','TestController@index_test')->name('exams.index');

Route::get('/exam/form/{test_id}','TestController@exam_form')->name('exam.form');


Route::post('/exam/diploma/','TestController@export_pdf')->name('exam.diploma.store');


// Parte para acceder a un EXERCISE  


Route::get('/exercise/index','TestController@index_exercises')->name('exercises.index');

Route::get('/exercise/form/{test_id}','TestController@exercise_form')->name('exercise.form');



//Para guardar las calificaciones de cada ejercicio.

Route::post('/exercise/test/','TestController@store_result')->name('exercise.test.store');


//Para ver las opciones elegidas por un usuario dentro de un TEST
    Route::get('/exercise/test/{result_id}','TestController@index_result')->name('exercise.result.index');



// Parte admin
Route::get('/admin/index','MaterialController@admin_index')->name('admin.index')->middleware('admin');

    // Parte admin de USERS
Route::get('/admin/users','UserController@users_index')->name('admin.users')->middleware('admin');


    //Para la creacion y almacenamiento de USERS
Route::get('/admin/users/create','UserController@create')->name('admin.users.create')->middleware('admin');
Route::post('/admin/users/store','UserController@store')->name('admin.users.store')->middleware('admin');

    //Para la actualizacion de USERS
    Route::get('/admin/users/update/{id}','UserController@update')->name('admin.users.update')->middleware('super_admin');
    Route::post('/admin/users/save_update','UserController@save_update')->name('admin.users.save_update')->middleware('super_admin');

    //Para la actualizacion de USERS
    Route::get('/admin/users/delete/{id}','UserController@delete')->name('admin.users.delete')->middleware('super_admin');


    // Parte admin de RESULTS
Route::get('/admin/results','ResultController@results_index')->name('admin.results')->middleware('admin');

    // Menu de RESULTS de un test espeficifico
Route::get('/admin/results/{id}','ResultController@results')->name('admin.results.menu')->middleware('admin');

    //Consultar para actualizar un RESULT 
Route::get('/admin/detail/{result_id}/{user?}','ResultController@detail_results')->name('admin.results.detail')->middleware('admin');
Route::post('/admin/result/update/','ResultController@update_mark')->name('admin.results.update')->middleware('admin');
    //Borrar un RESULT 
Route::get('/admin/result/delete/{result_id}/{user_id?}','ResultController@delete_result')->name('admin.results.delete')->middleware('admin');


//Para el userview de USERS
    Route::get('/admin/userview/{id}','UserController@user_view')->name('admin.userview')->middleware('admin');

//Buscador AJAX de users
Route::get('/live_search/action', 'LiveSearchController@action')->name('live_search.action')->middleware('admin');



//Parte de MATERIAL
Route::get('/admin/material','MaterialController@index')->name('admin.material')->middleware('admin');;

    //Para la creaccion y almacenamiento de MATERIAL
    Route::get('/admin/material/create','MaterialController@create')->name('admin.material.create')->middleware('admin');
    Route::post('/admin/material/store','MaterialController@store')->name('admin.material.store')->middleware('admin');
    
        //Para la actualizacion de MATERIAL
        Route::get('/admin/material/update/{test_id}','MaterialController@update')->name('admin.material.update')->middleware('admin');
        Route::post('/admin/material/save_update','MaterialController@save_update')->name('admin.material.save_update')->middleware('admin');
    
        //Para la actualizacion de MATERIAL
        Route::get('/admin/material/delete/{id}','MaterialController@delete')->name('admin.material.delete')->middleware('admin');

        //Para hacer publico una prueba
        Route::get('/admin/material/publication/{test_id}','MaterialController@publication')->name('admin.material.publication')->middleware('admin');

//Parte de QUESTION

Route::get('/admin/material/questions/{test_id}','QuestionController@index')->name('admin.questions')->middleware('admin');


    //Para la creaccion y almacenamiento de QUESTION

    Route::get('/admin/material/questions/create/{test_id}','QuestionController@create')->name('admin.question.create')->middleware('admin');
    Route::post('/admin/material/questions/store','QuestionController@store')->name('admin.question.store')->middleware('admin');
    
        //Para la actualizacion de QUESTION
        Route::get('/admin/material/questions/update/{question_id}','QuestionController@update')->name('admin.question.update')->middleware('admin');
        Route::post('/admin/material/questions/update/save_update','QuestionController@save_update')->name('admin.question.save_update')->middleware('admin');
    
        //Para la actualizacion de QUESTION
        Route::get('/admin/material/questions/delete/{question_id}','QuestionController@delete')->name('admin.question.delete')->middleware('admin');



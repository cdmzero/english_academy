<?php

use Illuminate\Support\Facades\Route;


//FRONT 


Auth::routes();

    // Index
Route::get('/','HomeController@index')->name('home');


    // Parte para editar del usuario logueado 
Route::get('/edit','UserController@config')->name('config');
Route::post('/profile/update','UserController@update_profile')->name('user.update_profile');

    //Para ver el perfil
Route::get('/profile','UserController@profile')->name('user.profile');



    // Para del AVATAR 
Route::get('/user/avatar/{filename?}','UserController@getImage')->name('user.avatar');

    // Subir fotos
Route::get('/img-upload','ImageController@create')->name('image.create');




//Parte para acceder a un EXAM

Route::get('/exams/index','TestController@index_test')->name('exams.index');

Route::get('/exam/form/{test_id}','TestController@exam_form')->name('exam.form');


// Parte para acceder a un EXERCISE  


Route::get('/admin/exercise/test/{test_id}','TestController@index_exercise')->name('test.result.index');



Route::post('/exercise/test/','TestController@store_result')->name('exercise.test.store');






//Para ver las opciones elegidas por un usuario dentro de un TEST
    Route::get('/exercise/test/{result_id}','TestController@index_result')->name('exercise.result.index');








//BACK



// Parte admin
Route::get('/admin/index','AdminController@admin_index')->name('admin.index');

    // Parte admin de USERS
Route::get('/admin/users','UserController@users_index')->name('admin.users');

    //Para la creaccion y almacenamiento de USERS
Route::get('/admin/users/create','UserController@create')->name('admin.users.create');
Route::post('/admin/users/store','UserController@store')->name('admin.users.store');

    //Para la actualizacion de USERS
    Route::get('/admin/users/update/{id}','UserController@update')->name('admin.users.update');
    Route::post('/admin/users/save_update','UserController@save_update')->name('admin.users.save_update');

    //Para la actualizacion de USERS
    Route::get('/admin/users/delete/{id}','UserController@delete')->name('admin.users.delete');


    // Parte admin de RESULTS
Route::get('/admin/results','ResultController@results_index')->name('admin.results');

    // Menu de RESULTS de un test espeficifico
Route::get('/admin/results/{id}','ResultController@results')->name('admin.results.menu');




    //Consultar para actualizar un RESULT 
Route::get('/admin/detail/{result_id}/{user?}','ResultController@detail_results')->name('admin.results.detail');
Route::post('/admin/result/update/','ResultController@update_mark')->name('admin.results.update');
    //Borrar un RESULT 
Route::get('/admin/result/delete/{result_id}/{user_id?}','ResultController@delete_result')->name('admin.results.delete');


//Para el userview de USERS
    Route::get('/admin/userview/{id}','UserController@user_view')->name('admin.userview');

//Buscador AJAX de users
Route::get('/live_search/action', 'LiveSearchController@action')->name('live_search.action');



//Parte de MATERIAL
Route::get('/admin/material','MaterialController@index')->name('admin.material');

    //Para la creaccion y almacenamiento de MATERIAL
    Route::get('/admin/material/create','MaterialController@create')->name('admin.material.create');
    Route::post('/admin/material/store','MaterialController@store')->name('admin.material.store');
    
        //Para la actualizacion de MATERIAL
        Route::get('/admin/material/update/{id}','MaterialController@update')->name('admin.material.update');
        Route::post('/admin/material/save_update','MaterialController@save_update')->name('admin.material.save_update');
    
        //Para la actualizacion de MATERIAL
        Route::get('/admin/material/delete/{id}','MaterialController@delete')->name('admin.material.delete');


//Parte de QUESTION

Route::get('/admin/material/questions/{test_id}','QuestionController@index')->name('admin.questions');

    //Para la creaccion y almacenamiento de QUESTION
    Route::get('/admin/material/questions/create/{test_id}','QuestionController@create')->name('admin.question.create');
    Route::post('/admin/material/questions/store','QuestionController@store')->name('admin.question.store');
    
        //Para la actualizacion de QUESTION
        Route::get('/admin/material/questions/update/{question_id}','QuestionController@update')->name('admin.question.update');
        Route::post('/admin/material/questions/update/save_update','QuestionController@save_update')->name('admin.question.save_update');
    
        //Para la actualizacion de QUESTION
        Route::get('/admin/material/questions/delete/{question_id}','QuestionController@delete')->name('admin.question.delete');



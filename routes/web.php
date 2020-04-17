<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

    // Index
Route::get('/','HomeController@index')->name('home');


    // Parte para editar del usuario logueado 
Route::get('/edit','UserController@config')->name('config');
Route::get('/profile','UserController@profile')->name('user.profile');
Route::post('/profile/update','UserController@update_profile')->name('user.update_profile');



    // Para del AVATAR 
Route::get('/user/avatar/{filename?}','UserController@getImage')->name('user.avatar');

    // Subir fotos
Route::get('/img-upload','ImageController@create')->name('image.create');

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

    // Parte la creacion y almacenamiento de RESULTS
Route::get('/admin/results/create','ResultController@create')->name('admin.results.create');
Route::post('/admin/results/store','ResultController@store')->name('admin.results.store');


    // Menu de RESULTS de un test espeficifico
Route::get('/admin/results/{id}','ResultController@results')->name('admin.results.menu');

    //Consultar para actualizar un RESULT 
Route::get('/admin/detail/{result_id}/{user?}','ResultController@detail_results')->name('admin.results.detail');
Route::post('/admin/result/update/','ResultController@update_mark')->name('admin.results.update');
    //Borrar un RESULT 
Route::get('/admin/result/delete/{result_id}/{user_id?}','ResultController@delete_result')->name('admin.results.delete');


//Para el userview de USERS
    Route::get('/admin/userview/{id}','UserController@user_view')->name('admin.userview');


//prueba de buscador AJAX
Route::get('/live_search/action', 'LiveSearchController@action')->name('live_search.action');





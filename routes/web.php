<?php

Route::get('/', function () {
    return view('welcome');
});

/* Вход в систему */
Route::post('/login', 'Auth\LoginController@login');

/* Маршруты управления администраторами (сотрудниками магазина) */
Route::get('/admin/get_all', 'Users\AdminController@getAll');
Route::post('/admin/create', 'Users\AdminController@create');
Route::post('/admin/update', 'Users\AdminController@update');
Route::get('/admin/get_by_id/{id}', 'Users\AdminController@getById');
Route::get('/admin/delete/{id}', 'Users\AdminController@delete');

<?php

Route::get('/', function () {
    return view('welcome');
});

/* Вход в систему */
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

/* Маршруты управления администраторами (сотрудниками магазина) */
Route::get('/admin/get_all', 'Users\AdminController@getAll');
Route::post('/admin/create', 'Users\AdminController@create');
Route::post('/admin/update', 'Users\AdminController@update');
Route::get('/admin/get_by_id/{id}', 'Users\AdminController@getById');
Route::get('/admin/delete/{id}', 'Users\AdminController@delete');

/* Маршруты управления мастерами */
Route::get('/master/get_all', 'Repairshop\MasterController@getAll');
Route::post('/master/create', 'Repairshop\MasterController@create');
Route::post('/master/update', 'Repairshop\MasterController@update');
Route::get('/master/get_by_id/{id}', 'Repairshop\MasterController@getById');
Route::get('/master/delete/{id}', 'Repairshop\MasterController@delete');

/* Маршруты управления запасными частями */
Route::get('/spare/get_all', 'Repairshop\SpareController@getAll');
Route::post('/spare/create', 'Repairshop\SpareController@create');
Route::post('/spare/update', 'Repairshop\SpareController@update');
Route::get('/spare/get_by_id/{id}', 'Repairshop\SpareController@getById');
Route::get('/spare/delete/{id}', 'Repairshop\SpareController@delete');

/* Маршруты управления заказами */
Route::get('/order/get_all', 'Repairshop\OrderController@getAll');
Route::post('/order/create', 'Repairshop\OrderController@create');
Route::post('/order/update', 'Repairshop\OrderController@update');
Route::get('/order/get_by_id/{id}', 'Repairshop\OrderController@getById');
Route::get('/order/delete/{id}', 'Repairshop\OrderController@delete');

/* Маршруты управления услугами */
Route::get('/service/get_all', 'Repairshop\ServiceController@getAll');
Route::post('/service/create', 'Repairshop\ServiceController@create');
Route::post('/service/update', 'Repairshop\ServiceController@update');
Route::get('/service/get_by_id/{id}', 'Repairshop\ServiceController@getById');
Route::get('/service/delete/{id}', 'Repairshop\ServiceController@delete');
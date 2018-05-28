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

Route::get('/spare/add_to_service/{spare_id}/{service_id}/{quantity}', 'Repairshop\SpareController@addSpareToService');
Route::get('/spare/get_spares_of_service/{service_id}', 'Repairshop\SpareController@getSparesOfService');
Route::get('/spare/delete_spares_from_service/{service_spare_id}', 'Repairshop\SpareController@deleteSparesFromService');
Route::get('/spare/check_if_available_at_store/{service_id}', 'Repairshop\SpareController@checkAvailabilityAtStore');


/* Маршруты управления заказами */
Route::get('/order/get_all', 'Repairshop\OrderController@getAll');
Route::post('/order/create', 'Repairshop\OrderController@create');
Route::post('/order/update', 'Repairshop\OrderController@update');
Route::get('/order/get_by_id/{id}', 'Repairshop\OrderController@getById');
Route::get('/order/delete/{id}', 'Repairshop\OrderController@delete');
Route::post('/order/estimate/', 'Repairshop\OrderController@estimate');
Route::get('/order/change_status/{id}', 'Repairshop\OrderController@changeStatus');
Route::get('/order/export_to_pdf/{order_id}', 'Repairshop\OrderController@exportToPdf');

/* Маршруты управления услугами */
Route::get('/service/get_all', 'Repairshop\ServiceController@getAll');
Route::post('/service/create', 'Repairshop\ServiceController@create');
Route::post('/service/update', 'Repairshop\ServiceController@update');
Route::get('/service/get_by_id/{id}', 'Repairshop\ServiceController@getById');
Route::get('/service/delete/{id}', 'Repairshop\ServiceController@delete');

/* Маршруты управления автомобилями */
Route::get('/auto/get_all', 'Repairshop\AutoController@getAll');
Route::post('/auto/create', 'Repairshop\AutoController@create');
Route::post('/auto/update', 'Repairshop\AutoController@update');
Route::get('/auto/get_by_id/{id}', 'Repairshop\AutoController@getById');
Route::get('/auto/delete/{id}', 'Repairshop\AutoController@delete');

Route::post('/auto/upload', 'Repairshop\AutoController@uploadImage');


/* Маршруты управления Клиентами */
Route::get('/customer/get_all', 'Users\CustomerController@getAll');
Route::post('/customer/create', 'Users\CustomerController@create');
Route::post('/customer/update', 'Users\CustomerController@update');
Route::get('/customer/get_by_id/{id}', 'Users\CustomerController@getById');
Route::get('/customer/delete/{id}', 'Users\AutoController@delete');
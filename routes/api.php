<?php

// Авторизация
Route::post('auth', 'Auth\LoginController@login')
    ->name('auth.login');

Route::group(['middleware' => 'jwt.auth'], function() {
    // Информация об авторизованном пользователе
    Route::get('auth', 'Auth\LoginController@auth')
        ->name('users.auth');

    // Пользователи
    Route::resource('users', 'Users\UsersController')
        ->only(['index', 'show', 'store', 'update'])
        ->names('users');

    // Организации
    Route::resource('companies', 'Company\CompanyController')
        ->only(['index'])
        ->names('companies');

    //Подразделения
    Route::resource('departments', 'Company\DepartmentsController')
        ->only(['index'])
        ->names('departments');

    // Должности
    Route::resource('positions', 'Positions\PositionsController')
        ->only(['index'])
        ->names('positions');

    //Категории должностей
    Route::resource('position-categories', 'Positions\CategoriesController')
        ->only(['index'])
        ->names('position-categories');

    // Логи
    Route::get('logs/object-types', 'Logs\LogsController@objectTypes')
        ->name('logs.object-types');

    Route::resource('logs', 'Logs\LogsController')
        ->only(['index', 'show'])
        ->names('logs');
});

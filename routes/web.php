<?php

// Authentication
Route::prefix('/')->group(function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
});

// Admin Routes
Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect('dashboard');
    });
    Route::get('dashboard', 'DashboardController@index')->name('admin.index');
    Route::resource('agents', 'AgentController');
    Route::resource('clients', 'ClientController');
    Route::resource('schedules', 'ScheduleController');
    Route::resource('dsrs', 'DSRController');
    Route::get('dsrs/{dsr}', 'DSRController@print')->name('dsrs.print');
    Route::get('bills', 'BillController@index')->name('bills.index');
    Route::get('bills/{dsr}', 'BillController@print')->name('bills.print');
    Route::resource('admins', 'AdminController');
});

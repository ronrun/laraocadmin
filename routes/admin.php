<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('login.submit');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

    // Password reset routes
    Route::get('password/reset', 'Admin\Auth\AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Admin\Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Admin\Auth\AdminResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Admin\Auth\AdminResetPasswordController@reset');




});
?>
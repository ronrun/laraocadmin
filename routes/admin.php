<?php


Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\Auth\LoginController@login')->name('admin.login.post');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {

    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

    // Password reset routes
    Route::get('password/reset', 'Admin\Auth\AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Admin\Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Admin\Auth\AdminResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Admin\Auth\AdminResetPasswordController@reset');

    Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth:admin'], function () {

        //Permission
        Route::resource('permission', 'Admin\User\PermissionController');

        //User
        Route::resource('user', 'Admin\User\UserController');
          
        //Role
        Route::get('role/autocomplete', 'Admin\User\RoleController@autocomplete');
        Route::resource('role', 'Admin\User\RoleController');
    });

});
?>
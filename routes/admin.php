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
          
          //動態呼叫 controller。controller_method如果是空值預設 index
          Route::put('{controller_name}/{controller_method?}', function ($controller_name, $controller_method) {
              $controller = app()->make('\App\Http\Controllers\Admin\User\\' . ucfirst($controller_name) . 'Controller');
              return $controller->callAction($controller_method, $parameters = []);
          });
          
          //動態呼叫 controller。controller_method如果是空值預設 index
          Route::post('{controller_name}/{controller_method?}', function ($controller_name, $controller_method) {
              $controller = app()->make('\App\Http\Controllers\Admin\User\\' . ucfirst($controller_name) . 'Controller');
              return $controller->callAction($controller_method, $parameters = []);
          });

          //動態呼叫 controller。controller_method如果是空值預設 index
          Route::get('{controller_name}/{controller_method?}', function ($controller_name, $controller_method = 'index') {
              $controller = app()->make('\App\Http\Controllers\Admin\User\\' . ucfirst($controller_name) . 'Controller');
              return $controller->callAction($controller_method, $parameters = []);
          });
      });

});
?>
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localize' ],
    'as' => 'lang.',
],
function(){
    $locale = \App::getLocale();

    $parameters = \Request::segments();

    //admin
    if(!empty($parameters[0]) && $parameters[0]=='admin'){
        $path = \Request::path();
        Route::redirect($path, "/$locale/$path");
    }

    if(!empty($parameters[1]) && $parameters[1]=='admin'){
        require_once('admin.php');
    }

    Route::redirect('/', '/' . $locale . '/welcome');
    Route::get('welcome', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('home', 'HomeController@index')->name('home');
});
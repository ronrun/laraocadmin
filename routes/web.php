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


/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    'as' => 'lang.',
],
function(){
    //$locale = 'zh-CN';
    $locale = \App::getLocale();

    Route::redirect('/', '/' . $locale . '/welcome');
    Route::get('welcome', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('home', 'HomeController@index')->name('home');
});
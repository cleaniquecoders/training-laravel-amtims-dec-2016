<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample/form/collective', function () {
    return view('samples.form-collective');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/about-us', 'StaticPageController@aboutUs')->name('static.aboutUs');

Route::get('/contact-us', 'StaticPageController@contactUs')->name('static.contactUs')->middleware('auth');

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin',
], function () {
    Route::resource('users', 'UserController');
    Route::resource('posts', 'PostController');
    Route::resource('media', 'MediumController');
});

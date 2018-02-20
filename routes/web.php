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


Auth::routes();
Route::get('/', 'HomeController@index')->name('index');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/profile', 'UserController@profile')->name('profile');
Route::get('/password', 'UserController@password')->name('password');
Route::post('/password', 'UserController@updatePassword')->name('password');
Route::post('/profile', 'UserController@updateProfile')->name('profile');


Route::get('/page/{id}', 'PageController@index')->name('page');
Route::get('/page/{id}/{slug}', 'PageController@slug')->name('page-slug');
Route::get('/about-us', 'UserController@updateProfile')->name('about-us');
Route::get('/contact-us', 'UserController@updateProfile')->name('contact-us');

Route::prefix(Config('platform.admin-route'))->name('admin.')->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

    Route::get('/user', 'Admin\DashboardController@index')->name('user');
    Route::get('/page', 'Admin\DashboardController@index')->name('page');
});
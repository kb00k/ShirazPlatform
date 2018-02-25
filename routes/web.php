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
Route::get('/about-us', 'PageController@aboutUs')->name('about-us');
Route::get('/contact-us', 'PageController@contactUs')->name('contact-us');


Route::get('/file', 'FileController@index')->name('file');
Route::get('/file/{id}', 'FileController@index')->name('file.view');

Route::get('/notification', 'NotificationController@index')->name('notification');


Route::get('/ticket/create', 'TicketController@create')->name('ticket.create');

Route::prefix(Config('platform.admin-route'))->name('admin.')->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

    Route::get('/user', 'Admin\UserController@index')->name('user');
    Route::get('/user/data', 'Admin\UserController@data')->name('user.data');
    Route::get('/user/edit/{id}', 'Admin\UserController@edit')->name('user.edit');
    Route::post('/user/update/{id}', 'Admin\UserController@update')->name('user.update');
    Route::get('/user/create', 'Admin\UserController@create')->name('user.create');
    Route::post('/user/insert', 'Admin\UserController@insert')->name('user.insert');
    Route::delete('/user/delete/{id}', 'Admin\UserController@delete')->name('user.delete');

    Route::get('/page', 'Admin\PageController@index')->name('page');
    Route::get('/page/data', 'Admin\PageController@data')->name('page.data');
    Route::get('/page/edit/{id}', 'Admin\PageController@edit')->name('page.edit');
    Route::post('/page/update/{id}', 'Admin\PageController@update')->name('page.update');
    Route::get('/page/create', 'Admin\PageController@create')->name('page.create');
    Route::post('/page/insert', 'Admin\PageController@insert')->name('page.insert');
    Route::delete('/page/delete/{id}', 'Admin\PageController@delete')->name('page.delete');

    Route::get('/invoice/add/{id}', 'Admin\PageController@index')->name('invoice.create.user');

    Route::get('/article', 'Admin\ArticleController@index')->name('article');


    Route::get('/transaction', 'Admin\TransactionController@index')->name('transaction');


    Route::get('/invoice', 'Admin\InvoiceController@index')->name('invoice');


    Route::get('/file', 'Admin\FileController@index')->name('file');


    Route::get('/ticket', 'Admin\TicketController@index')->name('ticket');


    Route::get('/account', 'Admin\InvoiceController@index')->name('account');


    Route::get('/category', 'Admin\InvoiceController@index')->name('category');


    Route::get('/setting', 'Admin\InvoiceController@index')->name('setting');


    Route::get('/app', 'Admin\AppController@index')->name('app');
});
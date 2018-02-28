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


Route::get('/free-pay', 'FreePayController@index')->name('free-pay');
Route::post('/free-pay/start', 'FreePayController@start')->name('free-pay.start');
Route::any('/free-pay/callback', 'FreePayController@callback')->name('free-pay.callback');


Route::get('/file', 'FileController@index')->name('file');
Route::get('/file/{id}', 'FileController@view')->name('file.view');


Route::get('/article', 'ArticleController@index')->name('article');
Route::get('/article/{id}', 'ArticleController@view')->name('article.view');

Route::get('/notification', 'NotificationController@index')->name('notification');


Route::get('/ticket/create', 'TicketController@create')->name('ticket.create');

Route::get('/forum', 'TicketController@create')->name('forum');

Route::post('/image-upload', 'ImageController@upload')->name('image-upload');

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
    Route::get('/article/data', 'Admin\ArticleController@data')->name('article.data');
    Route::get('/article/edit/{id}', 'Admin\ArticleController@edit')->name('article.edit');
    Route::post('/article/update/{id}', 'Admin\ArticleController@update')->name('article.update');
    Route::get('/article/create', 'Admin\ArticleController@create')->name('article.create');
    Route::post('/article/insert', 'Admin\ArticleController@insert')->name('article.insert');
    Route::delete('/article/delete/{id}', 'Admin\ArticleController@delete')->name('article.delete');

    Route::get('/transaction', 'Admin\TransactionController@index')->name('transaction');


    Route::get('/item', 'Admin\ItemController@index')->name('item');

    Route::get('/invoice', 'Admin\InvoiceController@index')->name('invoice');


    Route::get('/file', 'Admin\FileController@index')->name('file');


    Route::get('/ticket', 'Admin\TicketController@index')->name('ticket');


    Route::get('/account', 'Admin\InvoiceController@index')->name('account');


    Route::get('/category', 'Admin\CategoryController@index')->name('category');
    Route::get('/category/data', 'Admin\CategoryController@data')->name('category.data');
    Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'Admin\CategoryController@update')->name('category.update');
    Route::get('/category/create', 'Admin\CategoryController@create')->name('category.create');
    Route::post('/category/insert', 'Admin\CategoryController@insert')->name('category.insert');
    Route::delete('/category/delete/{id}', 'Admin\CategoryController@delete')->name('category.delete');


    Route::get('/setting', 'Admin\SettingController@index')->name('setting');
    Route::get('/setting/category/{id}', 'Admin\SettingController@category')->name('setting.category');
    Route::post('/setting/category/update/{id}', 'Admin\SettingController@updateCategory')->name('setting.category.update');
    Route::get('/setting/edit/{id}', 'Admin\SettingController@edit')->name('setting.edit');
    Route::post('/setting/update/{id}', 'Admin\SettingController@update')->name('setting.update');
    Route::get('/setting/create', 'Admin\SettingController@create')->name('setting.create');
    Route::post('/setting/insert', 'Admin\SettingController@insert')->name('setting.insert');
    Route::delete('/setting/delete/{id}', 'Admin\SettingController@delete')->name('setting.delete');

    Route::get('/app', 'Admin\AppController@index')->name('app');
});
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

Route::group(['namespace' => 'Administrator', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index')->name('administrator.index');
    Route::get('/datauser', 'AdminController@user')->name('administrator.user');

    Route::resource('/user', 'UserController');
    Route::get('/user/profile/{id}', 'UserController@profile')->name('user.profile');
    Route::get('/user/setting/{id}', 'UserController@setting')->name('user.setting');
    Route::put('/user/setting/{id}', 'UserController@settingUpdate')->name('user.settingUpdate');
    
    Route::resource('/permission', 'PermissionController');
    
    Route::resource('/task', 'TaskController');

    Route::resource('/kategori', 'KategoriController');

    Route::group(array('prefix' => 'menu'), function () {
        // Showing the admin for the menu builder and updating the order of menu items
        Route::get('/', 'MenuController@Index')->name('menu.index');
        Route::post('/', 'MenuController@postIndex');
        Route::post('new', 'MenuController@postNew')->name('menu.store');
        Route::post('delete', 'MenuController@postDelete')->name('menu.destroy');
        Route::get('edit/{id}', 'MenuController@getEdit')->name('menu.edit');
        Route::post('edit/{id}', 'MenuController@postEdit')->name('menu.update');
    });
});

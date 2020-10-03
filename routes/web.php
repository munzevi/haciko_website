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
use Illuminate\Support\Str;

Route::prefix('admin')->name('admin.')->middleware(['auth','web'])->group(function () {
	Route::get('home', 'CMS\HomeController@index')->name('home');
    Route::get('/filemanager','CMS\FilemanagerController@files')->name('filemanager');
    Route::group(['prefix'=>'management','middleware'=>['role:admin|super-admin']],function() {
    	Route::resource('roles','CMS\RoleController');
    	Route::resource('permissions','CMS\PermissionController');
		Route::resource('users', 'CMS\UsersController');
	});
    Route::group(['name'=>'settings.','prefix'=>'settings','middleware'=>['role:admin|super-admin']],function() {
        Route::resource('settings','CMS\SettingController');
        Route::resource('languages', 'CMS\LanguageController');
    });

    Route::group(['middleware'=>['role:admin|super-admin']],function() {
        Route::resource('sliders', 'CMS\SliderController');
        Route::resource('pages', 'CMS\ContentsController');
        Route::any('/{post}/update','CMS\PostsController@update')->name('update');
        Route::group(['name' => 'blog.', 'prefix' => 'blog'], function () {
            Route::resource('tags', 'CMS\TagsController');
            Route::resource('posts', 'CMS\ContentsController');
            Route::resource('blog-categories', 'CMS\ContentsController');
        });
    });
});

Auth::routes(['register' => false]);

Route::get('/', 'CMS\FrontendController@index')->name('homepage');
Route::get('{page}', 'CMS\FrontendController@index');
Route::get('{page}/{child}', 'CMS\FrontendController@index');
Route::get('{page}/{child}/{grandChild}', 'CMS\FrontendController@index');



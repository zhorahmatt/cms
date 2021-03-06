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
    return view('layouts.admin');
});

//routing user
Route::group(['prefix' => 'user', 'namespace' => 'Web'], function () {

	Route::group([], function(){
		Route::get('/', ['as' => 'User.index', 'uses' => 'UserController@index']);
		Route::get('/create', ['as' => 'User.create', 'uses' => 'UserController@create']);
        Route::post('/',['as' => 'User.store', 'uses' => 'UserController@store']);
        Route::get('/{id}/edit',['as' => 'User.edit', 'uses' => 'UserController@edit']);
        Route::put('/{id}',['as' => 'User.update', 'uses' => 'UserController@update']);
        Route::delete('/{id}',['as' => 'User.delete', 'uses' => 'UserController@delete']);
	});
});

//routing role
Route::group(['prefix' => 'role', 'namespace' => 'Web'], function () {

	Route::group([], function(){
		Route::get('/', ['as' => 'Role.index', 'uses' => 'RoleController@index']);
		Route::get('/create', ['as' => 'Role.create', 'uses' => 'RoleController@create']);
        Route::post('/',['as' => 'Role.store', 'uses' => 'RoleController@store']);
        Route::get('/{id}/edit',['as' => 'Role.edit', 'uses' => 'RoleController@edit']);
        Route::put('/{id}',['as' => 'Role.update', 'uses' => 'RoleController@update']);
        Route::delete('/{id}',['as' => 'Role.delete', 'uses' => 'RoleController@delete']);
	});
});

//routing permission
Route::group(['prefix' => 'permission', 'namespace' => 'Web'], function () {

	Route::group([], function(){
		Route::get('/', ['as' => 'Permission.index', 'uses' => 'PermissionController@index']);
		Route::get('/create', ['as' => 'Permission.create', 'uses' => 'PermissionController@create']);
        Route::post('/',['as' => 'Permission.store', 'uses' => 'PermissionController@store']);
        Route::get('/{id}/edit',['as' => 'Permission.edit', 'uses' => 'PermissionController@edit']);
        Route::put('/{id}',['as' => 'Permission.update', 'uses' => 'PermissionController@update']);
        Route::delete('/{id}',['as' => 'Permission.delete', 'uses' => 'PermissionController@delete']);
	});
});

//routing post
Route::group(['prefix' => 'post', 'namespace' => 'Web'], function () {

	Route::group([], function(){
		Route::get('/', ['as' => 'Post.index', 'uses' => 'PostController@index']);
		Route::get('/create', ['as' => 'Post.create', 'uses' => 'PostController@createPost']);
        Route::post('/',['as' => 'Post.store', 'uses' => 'PostController@storePost']);
	});
});
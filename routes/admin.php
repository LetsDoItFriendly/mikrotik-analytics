<?php

Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@getIndex']);
Route::resource('article', 'ArticleController');
Route::resource('category', 'CategoryController');
Route::resource('page', 'PageController');
Route::resource('user', 'UserController');
Route::resource('group', 'GroupController');
Route::resource('mikrotik', 'MikrotikController');
Route::resource('internet_protocol', 'InternetProtocolController');

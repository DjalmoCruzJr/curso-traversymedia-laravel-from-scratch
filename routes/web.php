<?php

Route::get('/',     'PagesController@index');
Route::get('/about',    'PagesController@about');
Route::get('/contact',  'PagesController@contact');
Route::get('/services',  'PagesController@services');

Route::resource('posts', 'PostsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

<?php

Route::get('/', 'HomeController@welcome')->name('home');
Route::get('/winnaars', 'WinnersController@index');
Route::get('/faq', 'FaqController@index');
Route::get('/actievelotingen', 'DrawController@index');
Route::get('/cookies', 'HomeController@cookies');

Route::get('/store', 'CategoriesController@index')->name('store');
Route::get('/store/{id}/{slug}', 'subCategoriesController@index');
Route::get('/products/{id}/{slug}', 'ProductController@show');

Route::POST('/products/search', 'ProductController@search');

Route::POST('/ticket', 'TicketController@store');

/* User Authentication Routes */
Auth::routes();
Route::get('/logout', 'HomeController@logout');
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

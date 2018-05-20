<?php

Route::get('/', 'HomeController@welcome')->name('home');
Route::get('/winnaars', 'WinnersController@index');
Route::get('/faq', 'FaqController@index');
Route::get('/actievelotingen', 'TicketController@getActiveTickets');


Route::get('/store', 'CategoriesController@index')->name('store'); //  /store contains main categories
Route::get('/store/{id}/{slug}', 'subCategoriesController@index'); // /id/slug gets sub categories that belong to $id
Route::get('/products/{id}/{slug}', 'ProductController@show'); // /product/id/slug gets products that belong to that category
Route::get('/beheer/producten', 'ControlPanelController@products');

Route::POST('/products/search', 'ProductController@search');

Route::POST('/ticket', 'TicketController@store');

/* User Authentication Routes */
Auth::routes();
Route::get('/logout', 'HomeController@logout');
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

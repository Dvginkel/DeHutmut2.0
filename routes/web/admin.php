<?php

Route::get('/', 'beheer\ControlPanelController@index')->name('adminIndex');


Route::get('/products', 'beheer\ProductController@index')->name('ProductsIndex');
Route::get('/products/create', 'beheer\ProductController@create')->name('createProduct');
Route::get('/products/{id}/edit', 'beheer\ProductController@edit');
Route::get('/products/{id}', 'beheer\ProductController@show');
Route::get('/products/{id}/delete', 'beheer\ProductController@delete');
Route::POST('/products', 'beheer\ProductController@create');
Route::POST('/products/{id}', 'beheer\ProductController@update');

Route::get('/categories', 'beheer\CategoryController@index');
Route::get('/categories/{id}/edit', 'beheer\CategoryController@edit');
Route::POST('/categories/{id}', 'beheer\CategoryController@update');


Route::POST('/categories/{id}/disable', 'beheer\CategoryController@disable');
Route::get('/categories/{id}/delete', 'beheer\CategoryController@delete');

Route::get('/posts', 'beheer\PostController@index');
Route::get('/posts/{id}/edit', 'beheer\PostController@update');
Route::POST('/posts', 'beheer\PostController@create');

Route::get('/faq', 'beheer\FaqController@index');
Route::post('/faq', 'beheer\FaqController@update');
Route::get('/faq/add', 'beheer\FaqController@create');
Route::get('/faq/{id}/edit', 'beheer\FaqController@show');
Route::get('/faq/{id}/delete', 'beheer\FaqController@delete');
Route::get('/faq/{id}/restore', 'beheer\FaqController@restore');



Route::get('/todo', 'TodoController@index');
Route::POST('/todo/{id}', 'TodoController@update');
Route::get('/users', 'beheer\UsersController@index');
Route::get('/winners', 'beheer\WinnersController@index');
Route::get('/drawWinner', 'beheer\WinnersController@drawWinner');
// Route::get('/product/{id}', 'ControlPanelController@getSubCatFromMainCat');
// Route::get('/product/{id}/edit', 'ControlPanelController@update');

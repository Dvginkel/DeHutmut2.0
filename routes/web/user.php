<?php

Route::get('/info', 'AccountController@index');
Route::get('/push', 'AccountController@push');
Route::get('/tickets', 'AccountController@tickets');
Route::POST('/pushRegister', 'AccountController@pushRegister');
Route::get('/afspraak', 'AccountController@afspraak');

Route::POST('/afspraak', 'AppointmentsController@create');
Route::get('/inbox', 'AccountController@inbox');
Route::POST('/info', 'AccountController@update');
Route::POST('/messages', 'MessagesController@store');

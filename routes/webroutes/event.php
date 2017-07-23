<?php

Route::get('/calendar', 'EventController@calendar')->name('event.calendar');
Route::get('/event/{event}', 'EventController@show')->name('event.show');
Route::get('/event/create', 'EventController@create')->name('event.create');
Route::post('/event', 'EventController@store')->name('event.store');
Route::get('/event/{event}/edit', 'EventController@edit')->name('event.edit');
Route::put('/event/{event}', 'EventController@update')->name('event.update');
Route::delete('/event/{event}', 'EventController@destroy')->name('event.destory');
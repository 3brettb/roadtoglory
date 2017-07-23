<?php

Route::get('/issues', 'RequestController@issues')->name('request.issues');
Route::get('/request/rules', 'RequestController@rules')->name('request.rules');
Route::get('/request/ir', 'RequestController@ir')->name('request.ir');
Route::get('/request/{request}', 'RequestController@show')->name('request.show');
Route::get('/request', 'RequestController@create')->name('request.create');
Route::post('/request', 'RequestController@store')->name('request.store');
Route::get('/request/{request}/edit', 'RequestController@edit')->name('request.edit');
Route::put('/request/{request}', 'RequestController@update')->name('request.update');
Route::delete('/request/{request}', 'RequestController@destroy')->name('request.destroy');
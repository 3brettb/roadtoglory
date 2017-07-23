<?php

Route::get('/message', 'MessageController@index')->name('message.index');
Route::get('/message/inbox', 'MessageController@inbox')->name('message.inbox');
Route::get('/message/create', 'MessageController@create')->name('message.create');
Route::get('/message/email', 'MessageController@email')->name('message.email');
Route::post('/message', 'MessageController@store')->name('message.store');
Route::get('/message/{message}', 'MessageController@show')->name('message.show');
Route::get('/message/{message}/edit', 'MessageController@edit')->name('message.edit');
Route::put('/message/{message}', 'MessageController@update')->name('message.update');
Route::delete('/message/{message}', 'MessageController@destroy')->name('message.destroy');
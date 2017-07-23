<?php

Route::get('/users', 'UserController@index')->name('user.index');
Route::get('/profile/{user}', 'UserController@profile')->name('user.profile');
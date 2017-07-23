<?php 
Route::post('/update/password', 'Action\UpdateController@password')->name('action.update.password');
Route::post('/update/profile', 'Action\UpdateController@profile')->name('action.update.profile');

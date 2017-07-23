<?php 
Route::post('/update/password', 'Action\UpdaterController@password')->name('action.update.password');
Route::post('/update/profile', 'Action\UpdaterController@profile')->name('action.update.profile');
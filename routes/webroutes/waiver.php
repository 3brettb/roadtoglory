<?php

Route::get('/waiver', 'WaiverController@index')->name('waiver.index');
Route::get('/waiver/{waiver}', 'WaiverController@show')->name('waiver.show');
Route::get('/waiver/claim/{claim}', 'WaiverController@claim')->name('waiver.claim');
Route::get('/waiver/order', 'WaiverController@order')->name('waiver.order');
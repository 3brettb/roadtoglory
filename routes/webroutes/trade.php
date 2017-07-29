<?php

Route::post('/trade/{trade}/accept', 'TradeController@accept')->name('trade.accept');
Route::post('/trade/{trade}/reject', 'TradeController@reject')->name('trade.reject');
Route::resource('/trade', 'TradeController');
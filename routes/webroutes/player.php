<?php

Route::get('/player/move/{player}', 'PlayerController@move')->name('player.move');
Route::resource('/player', 'PlayerController');
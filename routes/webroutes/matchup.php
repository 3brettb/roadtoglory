<?php

Route::get('/matchup', 'MatchupController@index')->name('matchup.index');
Route::get('/matchup/find', 'MatchupController@find')->name('matchup.find');
Route::get('/matchup/{matchup}', 'MatchupController@show')->name('matchup.show');

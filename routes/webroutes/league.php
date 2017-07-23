<?php

Route::get('/leagues', 'LeagueController@index')->name('league.index');
Route::get('/dashboard', 'LeagueController@dashboard')->name('league.dashboard');
Route::get('/standings', 'LeagueController@standings')->name('league.standings');
Route::get('/league/create', 'LeagueController@create')->name('league.create');
Route::get('/rankings', 'LeagueController@rankings')->name('league.rankings');
Route::get('/settings', 'LeagueController@settings')->name('league.settings');
Route::post('/league', 'LeagueController@store')->name('league.store');
Route::get('/settings/edit', 'LeagueController@edit')->name('league.edit');
Route::put('/league', 'LeagueController@update')->name('league.update');
Route::get('/permissions', 'LeagueController@permissions')->name('league.permissions');
Route::post('/permissions', 'LeagueController@save_permissions')->name('league.permissions_save');

Route::get('/league/{$id}', function($id){
    $team = \App\Models\League::find($id)->teams()->where('user_id', auth()->user()->id)->first();
    $user = auth()->user();
    $user->team_id = $team->id;
    $user->save();
    Redirect::to('/dashboard');
});
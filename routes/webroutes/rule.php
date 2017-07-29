<?php

Route::get('/rules', 'RuleController@index');
Route::resource('/rule', 'RuleController');
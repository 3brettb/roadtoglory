<?php

/*
|--------------------------------------------------------------------------
| Cron Routes
|--------------------------------------------------------------------------
|
| Here is where you can register cron routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| These routes all have the prefix '/cron' 
|
*/

Route::get('/test', function(){
    echo "cron routes test";
});

Route::get('/alive', function(){
    include_once(app_path().'/../resources/assets/php/system/test_cron.php');
});

/*
 * Daily Updates
 */

Route::get('/notes', function(){
    include_once(app_path().'/../resources/assets/php/system/daily/update_notes.php');
});

Route::get('/research', function(){
    include_once(app_path().'/../resources/assets/php/system/daily/update_research.php');
});

Route::get('/details', function(){
    include_once(app_path().'/../resources/assets/php/system/daily/update_details.php');
});

/*
 * Weekly Updates
 */

Route::get('/advanced', function(){
    include_once(app_path().'/../resources/assets/php/system/weekly/update_advanced.php');
});

Route::get('/list', function(){
    include_once(app_path().'/../resources/assets/php/system/weekly/update_player_list.php');
});
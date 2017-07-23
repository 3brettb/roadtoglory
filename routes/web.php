<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});

include_once('testing.php');

include_once('webroutes\activity.php');
include_once('webroutes\alert.php');
include_once('webroutes\chat.php');
include_once('webroutes\draft.php');
include_once('webroutes\event.php');
include_once('webroutes\league.php');
include_once('webroutes\matchup.php');
include_once('webroutes\message.php');
include_once('webroutes\player.php');
include_once('webroutes\poll.php');
include_once('webroutes\request.php');
include_once('webroutes\rule.php');
include_once('webroutes\season.php');
include_once('webroutes\team.php');
include_once('webroutes\trade.php');
include_once('webroutes\user.php');
include_once('webroutes\waiver.php');
include_once('webroutes\week.php');


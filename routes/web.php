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

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/test', function(){
    //include_once(app_path().'\..\resources\assets\php\system\tasks.php');
});

Route::get('/php', function(){
   //phpinfo();
});

Auth::routes();

/*
 * Page Routes
 */
Route::get('/home', 'PageController@home')->name('home');
Route::get('/profile', 'PageController@profile')->name('profile');
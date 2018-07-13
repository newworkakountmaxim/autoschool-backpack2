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
    return view('welcome');
});

//Route::group( function () {
    // Route::get('/guest', function () {
    //   return 'welcome guset';
    // })->middleware('guestMid');
//});

Route::middleware(['guestMid'])->group(function () {
    Route::resource('guest', 'TicketsController');
    //Route::get('admin/rule/{id}/user_func', 'Admin\RuleCrudController@user_func');
    

    // Route::get('/guest', function () {
    //   return 'welcome guset';
    // });

});

// Route::get('admin/dashboard', 'AdminController@dashboard')->name('backpack.dashboard')->middleware('can:dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('rules', 'RulesController@index');

//Route::get('/admin/rule/{id}/user_func', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

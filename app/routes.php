<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', 'UserController@Login');
Route::get('login', 'UserController@Login');
Route::get('users/create', 'UserController@Create');
Route::get('users/login', 'UserController@Login');
Route::get('users/logout', 'UserController@Logout');
Route::post('users/signin/{id}', 'UserController@Signin');
Route::resource('users', 'UserController');






Route::group(array('before' => 'auth'), function() {
    Route::get('accounts/index/{id}', 'AccountController@Index');
    Route::get('deposits/create/{id}', 'DepositController@Create');
    Route::get('deposits/index/{id}', 'DepositController@Index');
    Route::get('withdraws/create/{id}', 'WithdrawController@Create');
    Route::get('withdraws/index/{id}', 'WithdrawController@Index');
    Route::get('transactions/create/{id}', 'TransactionController@Create');
    Route::get('transactions/index/{id}', 'TransactionController@Index');
    Route::get('transactions/receive/{id}', 'TransactionController@Receive');
    Route::get('users/wallet/{id}', 'UserController@Wallet');
    Route::get('users/dashboard', 'UserController@Dashboard');
   
    Route::resource('deposits', 'DepositController');
    Route::resource('accounts', 'AccountController');
    Route::resource('withdraws', 'WithdrawController');
    Route::resource('transactions', 'TransactionController');

    Route::get('profiles/show/{id}', 'ProfileController@Show');
    Route::get('profiles/create/{id}', 'ProfileController@Create');

    Route::resource('profiles', 'ProfileController');
    Route::get('users/wallet', 'UserController@Wallet');
    Route::get('users/dashboard', 'UserController@Dashboard');
    Route::get('users/show/{id}', 'UserController@Show');
    Route::post('users/{id}', 'UserController@Show');
});

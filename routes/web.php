<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {

    return view('dashboard');
});
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    // Route::get('/', 'HomeController@index');

    // Route::get('/', function () {
    //     return view('dashboard');
    // });
    Route::get('/login', function () {
        return view('auth.login');
    });
    // Other routes
});

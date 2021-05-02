<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
| Version 1
*/
Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function () {

    /*
    |
    | Authentication Routes
    |
    */
    Route::group(['prefix' => 'auth', 'namespace' => 'Authentication'], function () {
        Route::post('login', 'LoginController@login');
        Route::post('register', 'RegisterController@register');

        Route::group(['prefix' => 'password'], function () {
            Route::post('request', 'PasswordResetController@requestPasswordReset');
            Route::put('reset', 'PasswordResetController@resetPassword');
        });

        Route::group(['prefix' => 'session', 'middleware' => 'auth:api'], function () {
            Route::post('', 'LoginController@getSession');
            Route::post('logout', 'LoginController@logout');
        });
    });

    Route::group(['middleware' => 'auth:api'], function () {
        Route::group(['prefix' => 'onboarding', 'namespace' => 'Onboarding'], function () {
            Route::group(['prefix' => 'bvn'], function () {
                Route::post('', 'BvnController@store');
                Route::post('otp', 'BvnController@requestOtp');
            });
            Route::group(['prefix' => 'bank-account'], function () {
                Route::post('', 'BankAccountController@store');
            });
        });
    });
});

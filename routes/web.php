<?php

use Illuminate\Support\Facades\Route;

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

// Landing Pages
Route::group([], function () {
    Route::get('/', 'LandingPageController@index')->name('home');
    Route::get('/about', 'LandingPageController@index')->name('about');
    Route::get('/contact', 'LandingPageController@index')->name('contact');
    Route::get('/faqs', 'LandingPageController@index')->name('faqs');
});

Route::post('mail', 'MailController@sendMail');


// // Authentication
// Route::group([], function () {
//     Route::get('/login', 'LandingPageController@index')->name('login');
//     Route::get('/register', 'LandingPageController@index')->name('register');
//     Route::get('/password/forgot', 'LandingPageController@index')->name('password.request');
//     Route::get('/password/reset/{token}', 'LandingPageController@index')->name('password.reset');
// });

// // Onboarding
// Route::group([], function () {
//     Route::get('/onboarding', 'LandingPageController@index')->name('onboarding');
// });

// Route::group(['prefix' => 'app'], function () {
//     Route::get('/', 'LandingPageController@index')->name('user.dashboard');
// });

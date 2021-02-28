<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['api_lang'])->group(function () {
    Route::prefix('clients')->group(function () {
        Route::post('register','Api\ClientController@register');
        Route::post('login','Api\ClientController@login');
        Route::middleware(['authorizeclient'])->group(function () {
            Route::get('profile','Api\ClientController@profile');
            Route::put('update','Api\ClientController@update');
            Route::put('update_fcm','Api\ClientController@update_fcm');
            Route::post('change_password','Api\ClientController@change_password');
        });
    });

    Route::prefix('social')->group(function () {
        Route::post('facebook','Api\SocialController@facebook');
        Route::post('google','Api\SocialController@google');
    });


    Route::prefix('consultants')->group(function () {
        Route::get('','Api\ConsultantController@index');
        Route::get('{consultant}','Api\ConsultantController@show');    
    });
    
    Route::get('search','Api\ConsultantController@search');
    Route::get('filter','Api\ConsultantController@filter');


    Route::get('settings','Api\SettingController@index');
    
    Route::post('requests','Api\RequestController@store');

    Route::prefix('rates')->middleware('authorizeclient')->group(function(){
        Route::post('consultant','Api\RateController@rate_consultant');
    });
    
    Route::post('send_message','Api\ContactController@send');
    Route::get('about','Api\ContactController@about');

    Route::resource('visits', 'Api\VisitController')->middleware('authorizeclient');  
});


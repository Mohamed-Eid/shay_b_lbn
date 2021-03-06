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


//AdminPanel Routes

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::middleware(['auth'])->group(function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::get('/settings', function () {
            return view('dashboard.settings.index');
        });
    
        Route::resource('users', 'Dashboard\UserController');
        Route::resource('consultants', 'Dashboard\ConsultantController');
        
        Route::resource('instructors', 'Dashboard\InstructorController');
        
        Route::resource('availables', 'Dashboard\AvailableController')->only(['destroy']);
        Route::resource('messages', 'Dashboard\ContactController');
        
        Route::resource('categories', 'Dashboard\CategoryController');
        Route::resource('courses', 'Dashboard\CourseController');

        Route::resource('courses.lessons', 'Dashboard\LessonController');
        
        Route::resource('features', 'Dashboard\FeatureController');
        
        Route::resource('visits', 'Dashboard\VisitController');
        
        Route::resource('clients', 'Dashboard\ClientController');
        
        Route::resource('events', 'Dashboard\EventController');
        Route::resource('event_features', 'Dashboard\EventFeatureController');

        Route::group(['prefix' => 'settings'], function (){
            // Route::get('contact','Dashboard\SettingController@contact')->name('settings.contact');
            Route::get('about','Dashboard\SettingController@about')->name('settings.about');
            // Route::get('home','Dashboard\SettingController@home')->name('settings.home');
            Route::put('update','Dashboard\SettingController@update')->name('settings.update');
        });
    });
});



// Route::get('/home', 'HomeController@index')->name('home');

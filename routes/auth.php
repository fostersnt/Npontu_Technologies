<?php

use App\Http\Controllers\ActivitiesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::controller(AuthController::class)->group(function()
{
    Route::get('/login', 'index')->name('login');
    Route::get('/users', 'get_users')->name('get-users');
    Route::get('/delete-user/{id}', 'delete_user');
    Route::post('/login-check', 'loginCheck')->name('login-check');  
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/registration-page', 'registerPage')->name('registration-page');
    Route::post('/register-user', 'register')->name('register-user');  
    //Route::get('delete/{id}', 'delete_user');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});

Route::controller(ActivitiesController::class)->group(function()
{
    Route::get('/activities', 'index')->name('activities');
    Route::get('/create-activity', 'create_page')->name('create-activity');
    Route::post('/store-activity', 'store')->name('store-activity');
    Route::get('/delete-activity/{id}', 'delete_activity');
    Route::get('/edit-activity/{id}', 'edit_page');
    Route::post('/save-update', 'save_update')->name('save-update');
    Route::get('today-activities', 'today_activities')->name('today-activities');
});
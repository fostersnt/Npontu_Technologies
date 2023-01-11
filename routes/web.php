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

require_once "auth.php";

Route::get('/', function () {

    $status = 'am';
    $current_time = '';
    $hour = date('H');
    $original_hour = 0;
    $original_minutes = date('i');

    if ($hour > 12) {
        $original_hour = $hour - 12;
        $status = 'pm';
        $current_time = $original_hour . ':' . $original_minutes . $status;
    }
    elseif ($hour == 12) {
        $original_hour = $hour;
        $status = 'noon';
        $current_time  = $original_hour . ':' . $original_minutes . $status;
    }
    else {
        $original_hour = $hour;
        $current_time = $original_hour . ':' . $original_minutes . $status;
    }
    //$date = date('H:i');
    return view('home', compact('current_time'));
})->name('home');
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
|Route::get('/', function () {
    return view('welcome');
});
*/
Route::redirect('/', '/admin');
Route::get('/tel', function () {
    return view('liuyan.tel');
});
Route::post('Phone','PhoneController@index');
Route::get('test','TestController@test');



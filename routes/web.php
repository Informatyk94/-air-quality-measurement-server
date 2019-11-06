<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

//Route::get('/input', function () {
////    dump(json_encode(request()->all()));
//    echo json_encode(request()->all());
//});

//Route::any('/input{node}{para}{api}', 'Controller@adding');

Route::get('/input', 'DataController@adding');
Auth::routes();

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('admin');
Route::post('register', 'Auth\RegisterController@register')->middleware('admin');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');


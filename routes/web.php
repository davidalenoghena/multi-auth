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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/agent', 'Auth\LoginController@showAgentLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/agent', 'Auth\RegisterController@showAgentRegisterForm');
Route::get('/research', 'HomeController@index')->name('home');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/agent', 'Auth\LoginController@agentLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/agent', 'Auth\RegisterController@createAgent');

Route::view('/home', 'home')->middleware('auth');
Route::get('/admin', 'AdminController@index');
Route::get('/agent', 'AgentController@index');

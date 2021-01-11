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
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin_login');
Route::get('/login/agent', 'Auth\LoginController@showAgentLoginForm')->name('agent_login');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('admin_reg');
Route::get('/register/agent', 'Auth\RegisterController@showAgentRegisterForm')->name('agent_reg');
Route::get('/research', 'HomeController@index')->name('home');
// Route::post('admin/user/update/{id}', 'HomeController@update')->name('update.payed');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/agent', 'Auth\LoginController@agentLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/agent', 'Auth\RegisterController@createAgent');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/agent', 'AgentController@index')->name('agent');

//Post section
Route::get('/admin/post', 'PostController@index')->name('admin.post');
Route::get('/admin/post/create', 'PostController@create')->name('admin.post.create'); 
Route::post('admin/post/store', 'PostController@store')->name('store.post');
Route::get('/admin/post/{id}', 'Post@show')->name('show.post');
Route::get('admin/post/edit/{id}', 'PostController@edit')->name('edit.post');
Route::post('admin/post/update/{id}', 'PostController@update')->name('update.post');
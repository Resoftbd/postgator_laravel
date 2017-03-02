<?php

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
Route::get('/logout', function()
{
    Auth::logout();
    Session::forget('users_id');
    Session::flush();
    return Redirect::to('/do_login');
});

Route::get('/menu', array('before' => 'auth.basic', function()
{
    if (Auth::check()) {
        return Redirect::to('/user_menu');
    } else {
        return Redirect::to('/do_login');
    }

}));

Route::get('/social_auth', array('before' => 'auth.basic', function()
{
    if (Auth::check()) {
        return Redirect::to('/social_auth');
    } else {
        return Redirect::to('/do_login');
    }

}));



Route::get('/social_auth', 'HomeController@index');
Route::post('user_auth',['as' => 'user_auth', 'uses' => 'HomeController@user_auth']);
//Route::post('/user_auth', 'HomeController@user_auth');
Route::get('/user_menu', 'HomeController@user_menu');
Route::get('/do_login', 'HomeController@do_login');
Route::post('/socialInfo', 'HomeController@social_info');
Route::post('/postText', 'HomeController@post_text');
Route::get('/dashboard', 'HomeController@dashboard');
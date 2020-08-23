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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/','IndexController@index');
Route::post('/search','IndexController@search');
Route::get('/read','IndexController@index');
Route::get('/read/{year}/{month}/{slug}','IndexController@show');
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::resource('dashboard/posts', 'PostController');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('dashboard/media', function () {
    return view('dashboard.media');
})->name('media');
Route::get('dashboard/livechat', function () {
    return view('dashboard.chat');
})->name('chat');
// Route::get('/home', function(){
//     return view('dashboard.home');
// });
<?php

use Illuminate\Http\Request;

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
//ログインされていない場合はから文字を返す
Route::get('/user', function() {
    return Auth::user();
})->name('user');

Route::get('/reflesh-token', function (Illuminate\Http\Request $request) {
    $request->session()->regenerateToken();

    return response()->json();
});

Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/photos', 'PhotoController@index')->name('photo.index');
Route::get('/photos/{id}', 'PhotoController@show')->name('photo.show');
Route::post('/photos', 'PhotoController@create')->name('photo.create');
Route::post('/photos/{photo}/comments', 'PhotoController@addComment')->name('photo.comment');

Route::put('/photos/{id}/like', 'PhotoController@like')->name('photo.like');
Route::delete('/photos/{id}/like', 'PhotoController@unlike');
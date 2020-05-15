<?php

// listen for queries to DB and show it in browser window
// DB::listen(function ($query){ var_dump($query->sql, $query->bindings); });

use App\Http\Controllers\ExploreController;
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

Route::middleware('auth')->group(function(){
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');
    Route::delete('/tweets/{tweet}', 'TweetsController@delete');
    
    Route::post('/tweets/{tweet}/like', 'TweetLikesController@like');
    Route::post('/tweets/{tweet}/dislike', 'TweetLikesController@dislike');

    Route::post('/profiles/{user:username}/follow', 'FollowsController@store');
    Route::post('/profiles/{user:username}/unfollow', 'FollowsController@delete');
    Route::get('/profiles/{user:username}/edit', 'ProfilesController@edit')->middleware('can:edit,user');
    Route::patch('/profiles/{user:username}', 'ProfilesController@update')->middleware('can:edit,user');

    Route::get('/explore', 'ExploreController@index');
});

Route::get('/profiles/{user:username}', 'ProfilesController@show')->name('profile');

Auth::routes();

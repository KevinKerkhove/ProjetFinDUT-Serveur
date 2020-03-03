<?php

use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('getUser', 'Api\AuthController@getUser');
    });
});

Route::prefix('v2')->middleware(['auth:api', 'role'])->group(function() {

    Route::middleware(['scope:admin,moderator,basic'])->get('/user/{id}', 'Api\UserController@show');

    // List users
    Route::middleware(['scope:admin,moderator,basic'])->get('/users', 'Api\UserController@index');

    // Add/Edit User
    Route::middleware(['scope:admin,moderator'])->post('/user', 'Api\UserController@create');

    Route::middleware(['scope:admin,moderator'])->put('/user/{userId}', 'Api\UserController@update');

    // Delete User
    Route::middleware(['scope:admin'])->delete('/user/{userId}', 'Api\UserController@delete');
});

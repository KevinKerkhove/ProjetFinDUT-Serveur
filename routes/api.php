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

Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('logout', 'Api\AuthController@logout');
    Route::get('me', 'Api\AuthController@me');
    Route::post('refresh', 'Api\AuthController@refresh');

    Route::get('users', 'Api\UserController@index');
    Route::get('users/{id}', 'Api\UserController@show');
    Route::put('users/{id}', 'Api\UserController@update');
    Route::delete('users/{id}', 'Api\UserController@delete');

    Route::get('absences', 'Api\AbsenceController@index');
    Route::get('absences/{id}', 'Api\AbsenceController@show');
    Route::put('absences/{id}', 'Api\AbsenceController@update');
    Route::delete('absences/{id}', 'Api\AbsenceController@destroy');

    Route::get('groupes', 'Api\GroupeController@index');
    Route::get('groupes/{id}', 'Api\GroupeController@show');
    Route::put('groupes/{id}', 'Api\GroupeController@update');
    Route::delete('groupes/{id}', 'Api\GroupeController@destroy');

});


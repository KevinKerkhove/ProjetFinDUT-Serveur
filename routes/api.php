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

Route::middleware(['auth:api', 'role'])->group(function() {

    // List users
    Route::middleware(['scope:admin,auteur,joueur'])->get('/users', 'Api\UserController@index');
    Route::middleware(['scope:admin,auteur,joueur'])->get('/user/{id}', 'Api\UserController@show');
    Route::middleware(['scope:admin,auteur,joueur'])->get('personnes', 'Api\PersonneController@index');
    Route::middleware(['scope:admin,auteur,joueur'])->get('personnes/{id}', 'Api\PersonneController@show');
    Route::get('getPersonne', 'Api\PersonneController@getPersonne');

    // Add/Edit User
    Route::middleware(['scope:admin,auteur,joueur'])->post('/user', 'Api\UserController@create');
    Route::middleware(['scope:admin,auteur,joueur'])->put('/user/{userId}', 'Api\UserController@update');
    Route::middleware(['scope:admin,auteur,joueur'])->put('personnes/{id}', 'Api\PersonneController@update');
    Route::middleware(['scope:admin,auteur,joueur'])->put('personnes', 'Api\PersonneController@update');

    // Delete User
    Route::middleware(['scope:admin'])->delete('/user/{userId}', 'Api\UserController@delete');
    Route::middleware(['scope:admin'])->delete('personnes/{id}', 'Api\PersonneController@destroy');

    Route::post('logout', 'Api\AuthController@logout');

    Route::get('getUser', 'Api\AuthController@getUser');

});

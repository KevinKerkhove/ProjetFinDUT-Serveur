<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {
    public $successStatus = 200;

    public function register(Request $request) {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);
        if ($validator->fails()) {
            return jsend_fail([
                "title" => "Registration failed",
                "body" => $validator->errors()
            ], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->role()->save(factory(Role::class)->make(['user_id' => $user->id, 'role' => 'joueur']));
        $success['token'] = $user->createToken('Taches-api', [$this->scope])->accessToken;
        return jsend_success($success);
    }

    public function login() {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $userRole = $user->role()->first();
            if ($userRole) {
                $this->scope = $userRole->role;
            }
            $success['token'] = $user->createToken('Taches-api', [$this->scope])->accessToken;
            return jsend_success($success);
        } else {
            return jsend_fail([
                "title" => "Unauthorised",
                "body" => "Nom d'utilisateur et/ou mot de passe incorrect"
            ], 401);
        }
    }

    public function logout(Request $request) {
        if (Auth::check()) {
            $token = Auth::user()->token();
            $token->revoke();
            return jsend_success(['successfully logout'], 201);
        }
        return jsend_fail([
            "title" => "Unauthorised",
            "body" => "Token invalid"
        ], 401);
    }

    public function getUser() {
        $user = Auth::user();
        return jsend_success(["user" => $user], 200);
    }
}

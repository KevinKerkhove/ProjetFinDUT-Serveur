<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {
    public $successStatus = 200;
    private $success;


    public function register(Request $request) {

    }

    public function login() {

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

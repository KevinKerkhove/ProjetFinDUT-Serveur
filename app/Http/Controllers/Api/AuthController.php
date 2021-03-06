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
        $validator = Validator::make($request->all(),
            [
                'nom' => 'required',
                'prenom' => 'required',
                'dateDeNaiss' => 'required',
                'email' => 'required|email|unique:users',
                'role' => 'required',
                'password' => 'required',
            ]);
        if ($validator->fails()) {
            return jsend_fail([
                "title" => "Registration failed",
                "body" => $validator->errors()
            ], 422);
        }
        $this->success = [];
        try {
            DB::transaction(function () use ($request){
                $input = $request->all();
                $input['password'] = bcrypt($input['password']);
                $user = User::create($input);
                $personne = factory(User::class)->create([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'dateDeNaiss' => $request->dateDeNaiss,
                    'avatar' => 'avatars/anonymous.png',
                    'grade' => $request->get('grade', false),
                    'role' => $request->role,
                ]);
                $path = null;
                if ($request->hasFile('avatar')) {
                    $path = $request->file('avatar')->storeAs('avatars', 'avatar_de_' . $personne->id . '.' . $request->file('avatar')->extension(), 'public');
                    $personne->avatar = $path;
                    $personne->save();
                }
                $this->success['personne'] = new UserResource($user);
                $this->success['token'] = $user->createToken('Absences-api')->accessToken;
            });
        } catch (Exception $e) {
            return jsend_error($e->getMessage(), $e->getCode());
        }
        return jsend_success($this->success);
    }

    public function login() {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['personne'] = new UserResource($user);
            $success['token'] = $user->createToken('Absences-api', [$this->success])->accessToken;
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

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}

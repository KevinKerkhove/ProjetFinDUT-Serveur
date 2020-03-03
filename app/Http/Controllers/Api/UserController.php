<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
    function index() {
        Log::info("dans UserController method index");
        return User::all();
    }

    function create(Request $request) {
        Log::info(sprintf("dans la requete create user" ));
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:4'
        ]);
        if ($validator->fails()) {
            return response()->json($errors = $validator->errors(), 403);
        }
        return User::create($request->all());

    }

    function update(Request $request, $id) {
        Log::info(sprintf("dans la requete modif user %s", $id ));
        try {
            $user = User::findOrFail($id);
            Log::info(sprintf("dans la requete modif user de nom %s", $user->email ));
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User not found.'
            ], 403);
        }
        Log::info(sprintf("dans la requete modif name ancien nom : %s, nouveau nom :  %s", $user->name, $request->get('name') ));

        $user->name = $request->get('name', $user->name);
        $user->save();

        return response()->json(['message'=>'User updated successfully.']);

    }

    function show($id) {
        try {
            $user = User::findOrFail($id);
            Log::info(sprintf("dans la requete modif user de nom %s", $user->email ));
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User not found.'
            ], 403);
        }

        return $user;

    }
    function delete($id) {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User not found.'
            ], 403);
        }

        $user->delete();

        return response()->json(['message'=>'User deleted successfully.']);

    }
}

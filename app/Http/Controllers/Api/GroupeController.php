<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\GroupeRessource;
use App\Model\Groupe;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupeController extends Controller
{
    public function index() {
        $groupe = Groupe::all();
        $data = GroupeRessource::collection($groupe);
        return jsend_success($data);
    }

    function create(Request $request) {
        $validator = Validator::make($request->all(),[
            'nom' => 'required',
            'promo' => 'required',
        ]);
        if ($validator->fails()) {
            return jsend_fail([
                "title" => "Creation failed",
                "body" => $validator->errors()
            ], 422);
        }
        $input = $request->all();
        $groupe = Groupe::create($input);
        $groupe->save();

        return jsend_success($groupe);
    }

    function update(Request $request, $id) {
        try {
            $groupe = Groupe::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return jsend_fail([
                "title" => "Groupe not found.",
            ], 422);
        }

        $groupe->nom = $request->get('nom', $groupe->nom);
        $groupe->promo = $request->get('promo', $groupe->promo);
        $groupe->save();

        return jsend_success(['groupe'=>$groupe], 200);
    }

    public function show($id) {
        try {
            $groupe = Groupe::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return jsend_fail([
                "title" => "Groupe not found.",
            ], 422);
        }
        $data = new GroupeRessource($groupe);
        return jsend_success($data);
    }

    public function destroy($id) {
        try {
            $groupe = Groupe::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return jsend_fail([
                "title" => "Groupe not found.",
            ], 422);
        }
        $groupe->delete();
        return jsend_success(['message' => 'Groupe deleted successfully.'], 204);
    }

}

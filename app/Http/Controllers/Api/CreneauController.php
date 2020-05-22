<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\CreneauRessource;
use App\Model\Creneau;
use http\Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CreneauController extends Controller
{
    public function index() {
        $creneau = Creneau::all();
        $data = CreneauRessource::collection($creneau);
        return jsend_success($data);
    }

    function create(Request $request) {
        $validator = Validator::make($request->all(),[
            'dateDeDebut' => 'required',
            'duree' => 'required',
            'salle' => 'required',
            'idModule' => 'required',
            'idGroupe' => 'required',
            'idEnseignant' => 'required'
        ]);
        if ($validator->fails()) {
            return jsend_fail([
                "title" => "Creation failed",
                "body" => $validator->errors()
            ], 422);
        }
        $input = $request->all();
        $creneau = Creneau::create($input);
        $creneau->save();

        return jsend_success($creneau);
    }

    public function destroy($id) {
        try {
            $creneau = Creneau::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return jsend_fail([
                "title" => "Creneau not found.",
            ], 422);
        }
        $creneau->delete();
        return jsend_success(['message' => 'Absence deleted successfully.'], 204);
    }

    public function show($id) {
        try {
            $creneau = Creneau::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return jsend_fail([
                "title" => "Creneau not found.",
            ], 422);
        }
        $data = new CreneauRessource($creneau);
        return jsend_success( $data);
    }

    function update(Request $request, $id) {
        try {
            $creneau = Creneau::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return jsend_fail([
                "title" => "Creneau not found.",
            ], 422);
        }

        $creneau->dateDeDebut = $request->get('dateDeDebut', $creneau->dateDeDebut);
        $creneau->duree = $request->get('duree', $creneau->duree);
        $creneau->salle = $request->get('salle', $creneau->salle);
        $creneau->idEnseignant = $request->get('idEnseignant', $creneau->idEnseignant);
        $creneau->save();

        return jsend_success(['creneau'=>$creneau], 200);
    }

}

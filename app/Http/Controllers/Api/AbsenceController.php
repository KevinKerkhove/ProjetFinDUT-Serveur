<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationFormRequest;
use App\Http\Resources\AbsenceRessource;
use App\Model\Absence;
use http\Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AbsenceController extends Controller
{
    public function index() {
        $absence = Absence::all();
        $data = AbsenceRessource::collection($absence);
        return jsend_success($data);
    }

    function create(Request $request) {
        $validator = Validator::make($request->all(),[
            'motif' => 'required',
            'justifiee' => 'required',
            'idCreneau' => 'required',
            'idEtudiant' => 'required'
        ]);
        if ($validator->fails()) {
            return jsend_fail([
                "title" => "Creation failed",
                "body" => $validator->errors()
            ], 422);
        }
        $input = $request->all();
        $absence = Absence::create($input);
        $absence->save();

        return jsend_success($absence);
    }

    function update(Request $request, $id) {
        try {
            $absence = Absence::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return jsend_fail([
                "title" => "Absence not found.",
            ], 422);
        }

        $absence->motif = $request->get('motif', $absence->motif);
        $absence->justifiee = $request->get('justifiee', $absence->justifiee);
        $absence->save();

        return jsend_success(['absence'=>$absence], 200);
    }

    public function show($id) {
        try {
            $absence = Absence::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return jsend_fail([
                "title" => "Absence not found.",
            ], 422);
        }
        $data = new AbsenceRessource($absence);
        return jsend_success( $data);
    }

    public function destroy($id) {
        try {
            $absence = Absence::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return jsend_fail([
                "title" => "Absence not found.",
            ], 422);
        }
        try {
            DB::transaction(function () use ($absence) {
                Storage::disk('public')->delete($absence->document);
            });
        } catch (Exception $e) {
            return jsend_error($e->getMessage(), $e->getCode());
        }
        $absence->delete();

        return jsend_success(['message' => 'Absence deleted successfully.'], 204);
    }

}

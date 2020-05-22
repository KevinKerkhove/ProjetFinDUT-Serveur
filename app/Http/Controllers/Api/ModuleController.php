<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\ModuleRessource;
use App\Model\Module;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\AssignOp\Mod;

class ModuleController extends Controller
{
    public function index() {
        $module = Module::all();
        $data = ModuleRessource::collection($module);
        return jsend_success($data);
    }

    function create(Request $request) {
        $validator = Validator::make($request->all(),[
            'nom' => 'required',
            'nbHeuresTotal' => 'required',
        ]);
        if ($validator->fails()) {
            return jsend_fail([
                "title" => "Creation failed",
                "body" => $validator->errors()
            ], 422);
        }
        $input = $request->all();
        $module = Module::create($input);
        $module->save();

        return jsend_success($module);
    }

    function update(Request $request, $id) {
        try {
            $module = Module::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return jsend_fail([
                "title" => "Module not found.",
            ], 422);
        }

        $module->nom = $request->get('nom', $module->nom);
        $module->nbHeuresTotal = $request->get('nbHeuresTotal', $module->nbHeuresTotal);
        $module->save();

        return jsend_success(['module'=>$module], 200);
    }

    public function show($id) {
        try {
            $module = Module::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return jsend_fail([
                "title" => "Module not found.",
            ], 422);
        }
        $data = new ModuleRessource($module);
        return jsend_success($data);
    }

    public function destroy($id) {
        try {
            $module = Module::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return jsend_fail([
                "title" => "Module not found.",
            ], 422);
        }
        $module->delete();
        return jsend_success(['message' => 'Module deleted successfully.'], 204);
    }

}

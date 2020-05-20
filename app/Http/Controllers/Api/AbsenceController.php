<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\AbsenceRessource;
use App\Model\Absence;

class AbsenceController extends Controller
{
    public function index() {
        $absence = Absence::all();
        $data = AbsenceRessource::collection($absence);
        return jsend_success($data);
    }

}

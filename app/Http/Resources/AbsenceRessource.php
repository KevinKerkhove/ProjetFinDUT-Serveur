<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AbsenceRessource extends JsonResource
{
    public function toArray($request) {
        if ($this->document == null)
            $path = 'avatars/pasDeJustif.png';
        else
            $path = $this->document;
        return [
            'id' => $this->id,
            'motif' => $this->motif,
            'justifiee' => $this->justifiee,
            'document'  => url(Storage::url($path)),
            'idCreneau' => $this->idCreneau,
            'idEtudiant' => $this->idEtudiant,
        ];
    }
}

<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CreneauRessource extends JsonResource
{
    public function toArray($request) {
        return [
            'id' => $this->id,
            'dateDeDebut' => $this->dateDeDebut,
            'duree' => $this->duree,
            'salle' => $this->salle,
            'idModule' => $this->idModule,
            'idGroupe' => $this->idGroupe,
            'idEnseignant' => $this->idEnseignant,
        ];
    }
}

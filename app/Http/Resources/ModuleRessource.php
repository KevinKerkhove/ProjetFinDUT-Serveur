<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class ModuleRessource extends JsonResource
{
    public function toArray($request) {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'nbHeuresTotal' => $this->nbHeuresTotal,
        ];
    }
}

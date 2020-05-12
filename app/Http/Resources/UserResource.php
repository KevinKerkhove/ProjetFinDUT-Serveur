<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        if ($this->avatar == null)
            $path = 'avatars/anonymous.png';
        else
            $path = $this->avatar;
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'dateDeNaiss' => $this->dateDeNaiss,
            'email' => $this->email,
            'avatar'  => url(Storage::url($path)),
            'grade' => $this->grade,
            'role' => $this->role,
            ];
    }
}

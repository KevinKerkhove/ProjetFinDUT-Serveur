<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    public function creneau() {
        return $this->hasMany(Creneau::class);
    }
}

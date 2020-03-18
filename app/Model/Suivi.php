<?php

namespace App\Modeles;

use Illuminate\Database\Eloquent\Model;

class Suivi extends Model
{
    function jeu() {
        return $this->belongsTo(Jeu::class);
    }
    function personne() {
        return $this->belongsTo(Personne::class);
    }
}

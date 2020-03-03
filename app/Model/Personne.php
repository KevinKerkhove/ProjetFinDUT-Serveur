<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model {
    function taches() {
        return $this->belongsToMany(Tache::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }
}

<?php


namespace App\Model;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    function jeux() {
        return $this->belongsToMany(Jeu::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }
}

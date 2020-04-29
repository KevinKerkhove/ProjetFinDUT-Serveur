<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    public function user() {
        return $this->hasMany(User::class);
    }

    public function creneau() {
        return $this->hasMany(Creneau::class);
    }
}

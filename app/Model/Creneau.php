<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Creneau extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function groupe() {
        return $this->belongsTo(Groupe::class);
    }

    public function module() {
        return $this->belongsTo(Module::class);
    }

    public function salle() {
        return $this->belongsTo(Salle::class);
    }

    public function absence() {
        return $this->hasMany(Absence::class);
    }
}

<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function document() {
        return $this->hasMany(Document::class);
    }

    public function creneau() {
        return $this->belongsTo(Creneau::class);
    }
}

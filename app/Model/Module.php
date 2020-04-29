<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function creneau() {
        return $this->hasMany(Creneau::class);
    }
}

<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function absence() {
        return $this->belongsTo(Absence::class);
    }
}

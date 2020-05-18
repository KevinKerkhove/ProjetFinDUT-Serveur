<?php

namespace App;

use App\Model\Absence;
use App\Model\Creneau;
use App\Model\Groupe;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'dateDeNaiss', 'avatar', 'grade', 'role', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function absence() {
        return $this->hasMany(Absence::class);
    }

    public function creneau() {
        return $this->hasMany(Creneau::class);
    }

    public function groupe() {
        return $this->belongsTo(Groupe::class);
    }

}

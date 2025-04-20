<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'esencia',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function criaturas()
    {
        return $this->belongsToMany(Criatura::class, 'user_criaturas')
                    ->withPivot(['nivel_actual', 'ataque_actual', 'defensa_actual', 'adquirida_en'])
                    ->withTimestamps();
    }

    public function userCriaturas()
    {
        return $this->hasMany(UserCriatura::class);
    }

    // Obtiene esencia que tiene el usuario
    public function obtenerEsenciaDisponible()
    {
        return $this->esencia;
    }
}

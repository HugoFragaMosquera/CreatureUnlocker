<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Criatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ataque',
        'defensa',
        'calidad',
    ];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'user_criaturas')
                    ->withPivot(['nivel_actual', 'ataque_actual', 'defensa_actual', 'adquirida_en'])
                    ->withTimestamps();
    }

    public function userCriaturas()
    {
        return $this->hasMany(UserCriatura::class);
    }

    // Color de fila de tabla de cada criatura según su calidad
    public function calidadColor()
    {
        return match ($this->calidad) {
            'legendaria' => 'linear-gradient(to right,rgb(248, 200, 80),rgb(209, 143, 29))',
            'épica'      => 'linear-gradient(to right,rgb(160, 83, 231),rgb(103, 22, 173))',
            'rara'       => 'linear-gradient(to right,rgb(72, 124, 209),rgb(26, 90, 168))',
            'común'      => 'linear-gradient(to right,rgb(91, 221, 173),rgb(26, 163, 108))',
        };
    }

    // Valor de venta de cada criatura según  su calidad
    public function valorVenta()
    {
        $valores = [
            'común' => 25,
            'rara' => 40,
            'épica' => 75,
            'legendaria' => 150,
        ];

        return $valores[$this->calidad] ?? 0;
    }
}
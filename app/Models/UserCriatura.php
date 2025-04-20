<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCriatura extends Model
{
    protected $table = 'user_criaturas';

    protected $fillable = [
        'user_id',
        'criatura_id',
        'nivel_actual',
        'ataque_actual',
        'defensa_actual',
        'adquirida_en',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function criatura()
    {
        return $this->belongsTo(Criatura::class);
    }
}

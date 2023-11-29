<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'niveles';

    protected $guarded = [];

    public function juego() {
        return $this->belongsTo(Juego::class, 'juego_id');
    }
    public function progresoUsuarios()
    {
        return $this->hasMany(ProgresoUsuario::class, 'nivel_id');
    }
}

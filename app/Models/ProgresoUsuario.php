<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresoUsuario extends Model
{
    use HasFactory;

    protected $table = 'progresoUsuarios';

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function juego()
    {
        return $this->belongsTo(Juego::class, 'juego_id');
    }

    public function nivel()
{
    return $this->belongsTo(Nivel::class, 'nivel_id');
}
}

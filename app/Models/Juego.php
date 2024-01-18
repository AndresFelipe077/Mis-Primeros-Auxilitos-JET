<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;

    protected $table = 'juegos';

    public function niveles()
    {
        return $this->hasMany(Nivel::class, 'juego_id');
    }
}

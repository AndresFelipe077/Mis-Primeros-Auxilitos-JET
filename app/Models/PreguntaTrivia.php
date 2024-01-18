<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaTrivia extends Model
{
    use HasFactory;

    protected $table = "preguntasTrivias";

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'nivel_id');
    }

}

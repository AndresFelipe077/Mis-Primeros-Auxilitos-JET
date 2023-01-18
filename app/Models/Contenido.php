<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'autor',
        'description',
    ];

    //Relacion uno a muchos Inversa(Contenidos->user)
    public function user(){ 
        return $this->belongsTo(User::class, 'user_id');
    }

}

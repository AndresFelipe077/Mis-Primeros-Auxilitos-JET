<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    use HasFactory;

    protected $table = "contenidos";

    protected $fillable = [
        'title',
        'slug',
        'url',
        'video_url',
        'autor',
        'description',
        'user_id',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relacion uno a muchos Inversa(Contenidos->user)
    public function user(){ 
        return $this->belongsTo('App\Models\User');
    }

}

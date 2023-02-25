<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trivia extends Model
{
    use HasFactory;

    protected $table = "trivias";

    protected $fillable =
    [
        'title',
        'slug',
        'image',
        'content',
        'respuesta1',
        'respuesta2',
        'respuesta3',
        'respuesta4',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

}

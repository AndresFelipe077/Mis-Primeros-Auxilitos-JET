<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trivia extends Model
{
    use HasFactory;

    protected $table = "trivias";

<<<<<<< HEAD
    protected $fillable = ['title', /*'slug',*/ 'image' ,'content'];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
=======
    protected $fillable =
    [
        'title',
        'slug',
        'image',
        'content'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
>>>>>>> b0da66013f5da5f1272adae7282b4efbd48a6917

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adivinanza extends Model
{
    use HasFactory;

    protected $table = "adivinanzas";

    protected $fillable = ['title', 'image' ,'content'];

}

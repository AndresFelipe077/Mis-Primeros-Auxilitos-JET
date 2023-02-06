<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['video_title', 'slug','video_url','description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }


}

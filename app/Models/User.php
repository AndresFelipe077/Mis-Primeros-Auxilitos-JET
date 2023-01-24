<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{

    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'genero',
        'fechaNacimiento',
        'password',
        'description',
        'fb_id',
        'avatar',
        'external_id',
        'external_auth',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        
    ];

    // //Relaciones uno a muchos
    public function socialProfiles()
    {
        return $this->hasMany('App\Models\SocialController');
    }

    //imagen del admin
    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
    }

    //rol
    public function adminlte_desc()
    {
        return 'Super Admin';
    }

    //perfil
    public function adminlte_profile_url()
    {
        return 'profile/username';
    }

    //Relacion uno a muchos (Contenidos)
    public function contenidos(){
        return $this->hasMany('App\Models\Contenido');
    }


}//Fin

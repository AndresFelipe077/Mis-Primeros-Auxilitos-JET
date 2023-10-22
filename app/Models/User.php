<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

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

    protected $table = "users";

    protected $guarded = [];

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

    //imagen del admin
    public function adminlte_image()
    {
        if(Auth::user()->external_auth == 'google' ||Auth::user()->external_auth == 'facebook'){
            return Auth::user()->avatar;//'https://picsum.photos/300/300';
        }else{
            return Auth::user()->profile_photo_url;
        }
    }

    //rol
    public function adminlte_desc()
    {
        return 'Super Admin';
    }

    //perfil
    public function adminlte_profile_url()
    {
        return '/user/profile';
    }

    //Relacion uno a muchos (Contenidos)
    public function contenidos(){
        return $this->hasMany('App\Models\Contenido');
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }


    public function subscriptions()
{
    return $this->hasMany(Subscription::class, 'user_id');
}
public function subscription()
{
    return $this->hasOne(Subscription::class);
}



}//Fin
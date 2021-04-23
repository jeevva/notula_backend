<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Meetings;
use App\Notulas;
use App\User;
use App\Points;
use App\NextActions;
use App\Documentations;
use App\Attendances;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPasswordNotification;

class User extends Authenticatable implements JWTSubject
{
    protected $table = 'users';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return[];
    }
    public function meetings(){
        return $this->hasMany(Meetings::class);
    }
    public function notulas(){
        return $this->hasMany(Notulas::class);
    }
    public function points(){
        return $this->hasMany(Points::class);

    }

    public function next_actions(){
        return $this->hasMany(NextActions::class);
    }
    public function documentations(){
        return $this->hasMany(Documentations::class);
    }
    public function attendances(){
        return $this->hasMany(Attendances::class);
    }
    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }
}

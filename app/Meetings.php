<?php

namespace App;
use App\Notulas;
use App\Attendances;
use App\Photos;
use App\Records;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Meetings extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function notulas(){
        return $this->hasMany(Notulas::class);
    }
    public function attendances(){
        return $this->hasMany(Attendances::class);
    }
    public function photos(){
        return $this->hasMany(Photos::class);
    }
    public function records(){
        return $this->hasMany(Records::class);
    }

}

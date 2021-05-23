<?php

namespace App;
use App\Notulas;
use App\Attendances;
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

}

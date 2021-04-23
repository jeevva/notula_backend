<?php

namespace App;
use App\Notulas;
use App\Meets;
use App\User;
use App\Points;
use App\NextActions;
use App\Documentations;
use App\Attendances;
use Illuminate\Database\Eloquent\Model;

class vwNotulas extends Model
{
    protected $table = 'vwNotulas';
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function meets(){
        return $this->belongsTo(Meets::class);
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
}

<?php

namespace App;
use App\Notulas;
use App\Meetings;
use App\User;
use App\Points;
use App\NextActions;
use App\FollowUp;
use App\Documentations;
use App\Attendances;
use Illuminate\Database\Eloquent\Model;

class Notulas extends Model
{
    // protected $table = 'vwNotulas';
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function meetings(){
        return $this->belongsTo(Meetings::class);
    }

    public function points(){
        return $this->hasMany(Points::class);
    }

    public function next_actions(){
        return $this->hasMany(NextActions::class);
    }
    public function follow_up(){
        return $this->hasMany(followUp::class);

    }
    public function documentations(){
        return $this->hasMany(Documentations::class);
    }
    public function attendances(){
        return $this->hasMany(Attendances::class);
    }
}

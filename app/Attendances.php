<?php

namespace App;
use App\Meetings;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function meetings(){
        return $this->belongsTo(Meetings::class);
    }
}

<?php

namespace App;
use App\User;
use App\Meetings;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function meetings(){
        return $this->belongsTo(Meetings::class);
    }
}

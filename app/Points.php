<?php

namespace App;
use App\User;
use App\Notulas;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function notula(){
        return $this->belongsTo(Notulas::class);
    }
}

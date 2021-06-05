<?php

namespace App;
use App\User;
use App\Notulas;

use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    //
    protected $table = 'follow_up';
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function notula(){
        return $this->belongsTo(Notulas::class);
    }

}

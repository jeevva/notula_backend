<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NextActions extends Model
{
    //
    protected $table = 'next_actions';
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function notula(){
        return $this->belongsTo(Notulas::class);
    }

}

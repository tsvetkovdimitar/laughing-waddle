<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    public function photos(){

        return $this->morphMany('App\Photo', 'imageable');

    }
}

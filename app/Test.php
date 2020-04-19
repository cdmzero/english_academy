<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

    protected $table = 'tests';


    public function results(){

        return $this->hasMany('App\Result');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function questions(){

        return $this->hasMany('App\Question');
    }

}

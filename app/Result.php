<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{



    //Relaccion  Muchos a 1

    public function user(){

        return $this->belongsTo('App\User');
        
    }

    public function test(){

        return $this->belongsTo('App\Test');
        
    }

    //Relaccion 1 a muchos


    public function choices(){

        return $this->hasMany('App\Choice');
    }
    

}

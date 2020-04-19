<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{



    //Relaccion  Muchos a Uno

    public function user(){

        return $this->belongsTo('App\User');
        
    }

    public function test(){

        return $this->belongsTo('App\Test');

    }

    

}

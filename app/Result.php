<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{

    protected $table = 'results';

    protected $fillable = ['id','test_id','user_id','mark','date_time'];

    //Relaccion  Muchos a Uno

    public function user(){

        return $this->belongsTo('App\User','user_id');
        
    }

    public function test(){

        return $this->belongsTo('App\Test','test_id');

    }

    

}

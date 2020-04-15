<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choices extends Model
{

    protected $table = 'choices';

    //Relaccion  Muchos a Uno

    public function user(){

        return $this->belongsTo('App\User','user_id');
        
    }
    
    public function qna(){

        return $this->belongsTo('App\Qna','qna_id');

    }

}

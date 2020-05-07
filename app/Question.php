<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function options(){

        return $this->hasMany('App\Option');
    }
    public function choices(){

        return $this->hasMany('App\Choice');
    }

    public function tests()
    {
        return $this->belongsTo('App\Test');
    }
    
}

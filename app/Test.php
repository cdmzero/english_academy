<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

    protected $table = 'tests';


    public function result(){

        return $this->hasMany('App\Result');
    }

}

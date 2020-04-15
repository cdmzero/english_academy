<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qna extends Model
{

     protected $table = 'qna';

    public function test(){

        return $this->belongsTo('App\Test','test_id');

    }
}

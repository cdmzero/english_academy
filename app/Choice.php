<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    
    public function result()
    {
        return $this->belongsTo('App\Result');
    }
}

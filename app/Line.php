<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    public function result()
    {
        return $this->belongsTo('App\Result');
    }

}

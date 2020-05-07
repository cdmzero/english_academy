<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{


    protected $fillable = [
        'option_number','option_title',
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}

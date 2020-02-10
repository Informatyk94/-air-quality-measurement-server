<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    public function measurement(){
        return $this->belongsToMany('App\Measurement')->withTimestamps();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kritik extends Model
{
    protected $table = "kritik";
    protected $fillable = ['user_id','film_id','isi','point'];
    

    public function film()
    {
        return $this->belongsTo('App\Film');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}


// $point = Kritik::avg('point');
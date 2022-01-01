<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = "genre";
    protected $fillable = ['id','nama','desc'];
    public $timestamps = false;

    public function film()
    {
        return $this->hasMany('App\Film');
    }
}

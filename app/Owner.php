<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = ['name','ssn'];
    
    public function own()
    {
        return $this->hasMany('App\Dorm','owner_ssn');
    }
}

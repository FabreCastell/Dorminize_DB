<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = "staffs";
    protected $fillable = ['ssn','name','position','gender','work_hour','phone_number','salary'];
    public function dorm()
    {
        return $this->belongsTo('App\Dorm');
    }
}

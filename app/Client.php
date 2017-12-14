<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['ssn','name','job','previous_address'];

    protected $primaryKey = 'ssn';

    public $incrementing = false;

    public function pay()
    {
        return $this->hasMany('App\Bill');
    }

    public function rent()
    {
        return $this->belongsToMany('App\Room','clients_rooms');
    }
}

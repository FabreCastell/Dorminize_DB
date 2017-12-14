<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['number','status','checkin_date'];


    public function room()
    {
        return $this->hasMany('App\Bill','room_id');
    }

    public function client()
    {
        return $this->belongsToMany('App\Client','clients_rooms');
    }

    public function type()
    {
        return $this->belongsTo('App\RoomType');
    }

    public function dorm()
    {
        return $this->belongsTo('App\Dorm');
    }

    public function furniture()
    {
        return $this->hasMany('App\furniture','room_id');
    }
}

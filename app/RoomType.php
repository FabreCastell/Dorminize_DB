<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = ['name','size','deposit','rental_price','pic_dest'];

    public function has()
    {
        return $this->hasMany('App\Room','type_id');
    }
}

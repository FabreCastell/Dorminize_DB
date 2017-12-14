<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    protected $table = 'furnitures';
    protected $fillable = ['name','description','quantity','cost','buy_date','change_date','pic_dest'];
    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function dorm()
    {
        return $this->belongsTo('App\Dorm');
    }
}

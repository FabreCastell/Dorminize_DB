<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dorm extends Model
{

    public $incrementing = false;

    protected $fillable = ['name','location','building_amt','room_amt','elec_unit_cost','water_unit_cost','description','rule','pic_dest','owner_ssn'];

    public function ownedby()
    {
        return $this->belongsTo('App\Owner');
    }

    public function collect()
    {
        return $this->hasMany('App\Bill','dorm_id');
    }

    public function expense()
    {
        return $this->hasMany('App\DormExpense','dorm_id');
    }

    public function furniture()
    {
        return $this->hasMany('App\Furniture','dorm_id');
    }

    public function room()
    {
        return $this->hasMany('App\Room','dorm_id');
    }

    public function staff()
    {
        return $this->hasMany('App\Staff','dorm_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DormExpense extends Model
{
    protected $fillable = ['date','elec_cost','water_cost','dorm_id'];

    public function dorm()
    {
        return $this->belongsTo('App\Dorm');
    }
}

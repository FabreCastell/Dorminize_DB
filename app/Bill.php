<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'elec_unit', 'water_unit', 'date', 'status'
    ];

    protected $primaryKey = 'invoice_number';

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function dorm()
    {
        return $this->belongsTo('App\Dorm');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }
}

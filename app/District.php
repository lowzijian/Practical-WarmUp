<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'code',
        'name',
        'seat_id',
    ];

    public function seat()
    {
        return  $this->belongsTo(Seat::class);
    }
}

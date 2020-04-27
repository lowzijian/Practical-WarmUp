<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'code',
        'name',
    ];

    public function districts()
    {
        return  $this->hasMany(District::class);
    }
}

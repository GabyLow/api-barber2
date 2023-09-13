<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'barber_id',
        'date',
        'start_time',
        'end_time'
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class, 'barber_id');
    }
}

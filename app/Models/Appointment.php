<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'id_client',
        'id_branch',
        'id_barber',
        'id_service',
        'id_drink',
        'id_music',
        'id_date',
        'id_time',
        'id_price'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'id_branch');
    }

    public function barber()
    {
        return $this->belongsTo(Barber::class, 'id_barber');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }

    public function drink()
    {
        return $this->belongsTo(Drink::class, 'id_drink');
    }

    public function music()
    {
        return $this->belongsTo(Music::class, 'id_music');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $fillable = ['name'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'id_drink');
    }
}

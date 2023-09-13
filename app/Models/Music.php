<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = ['name'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'id_music');
    }
}

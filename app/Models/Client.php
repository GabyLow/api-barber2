<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'birthday', 'phone', 'email'];
    
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'id_client');
    }
}

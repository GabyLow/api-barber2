<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    protected $fillable = ['name', 'branch_id'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'id_barber');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}

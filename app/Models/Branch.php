<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['name'];

    public function barbers()
    {
        return $this->hasMany(Barber::class, 'branch_id');
    }
}

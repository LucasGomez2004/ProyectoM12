<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    function nom(){
        return ($this->name);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    protected $table = 'location';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['reservation','start_date','end_date'];

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
    
}

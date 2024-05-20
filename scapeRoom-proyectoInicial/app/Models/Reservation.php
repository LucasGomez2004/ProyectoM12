<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['reservation','start_date','end_date', 'participants', 'user_id', 'location_id'];

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}

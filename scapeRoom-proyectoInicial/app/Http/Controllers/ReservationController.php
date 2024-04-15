<?php

namespace App\Http\Controllers;
use App\Models\Reservation;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){
        $all_reservations = Reservation::all();
        $reservations = [];

        foreach ($all_reservations as $reservation){
            $reservations[] = [
                'title' => $reservation->reservation,
                'start' => $reservation->start_date,
                'end' => $reservation->end_date,
            ];
        }
        return view('calendar.calendar',compact('reservations'));
    }
}

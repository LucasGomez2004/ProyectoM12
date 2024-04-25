<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Location;
use App\Models\Service;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){
        $all_reservations = Reservation::all();
        $reservations = [];

        foreach ($all_reservations as $reservation){
            $reservations[] = [
                'start' => $reservation->start_date,
                'end' => $reservation->end_date,
            ];
        }
        return view('calendar.calendar',compact('reservations'));
    }

    function list(Request $request){

        $reservation = Reservation::all();

        return view('reservation.list' , ['reservation' => $reservation]);
    }

    function new(Request $request){

        if ($request->isMethod('post')) {

            $reservation = new Reservation;
            $reservation->start_date = $request->start_date;
            $reservation->end_date = $request->end_date;
            $reservation->service_id = $request->service_id;
            $reservation->location_id = $request->location_id;

            $reservation->save();

        return redirect()->route('reservation.list')->with('status', 'Nuevo Usuario '.$reservation->reservation.' Creado!');
        }
        $locations = Location::all();
        $services = Service::all();
        return view('reservation.new',['locations' => $locations, 'services' => $services]);
    }
}

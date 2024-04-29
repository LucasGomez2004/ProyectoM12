<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Location;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{
    public function index(){
        $all_reservations = Reservation::all();
        $reservations = [];

        foreach ($all_reservations as $reservation){
            $reservations[] = [
                'title' => $reservation->user->name,
                'start' => $reservation->start_date,
                'end' => $reservation->end_date,
            ];
        }
        return view('calendar.calendar',compact('reservations'));
    }

    function list(Request $request){

        $filterValue = $request->input("filterValue");
        $reservationFilter = Reservation::where('user_id', 'LIKE', '%'.$filterValue.'%');

        $reservation = $reservationFilter->paginate(10);

        $reservation = Reservation::all();

        return view('reservation.list' , ['reservation' => $reservation]);
    }

    function new(Request $request){

        if ($request->isMethod('post')) {
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'service_id' => 'required|exists:services,id',
                'location_id' => 'required|exists:location,id',
                'user_id' => 'required|exists:users,id',
            ]);

            $reservation = new Reservation;
            $reservation->start_date = $request->start_date;
            $reservation->end_date = $request->end_date;
            $reservation->service_id = $request->service_id;
            $reservation->location_id = $request->location_id;
            $reservation->user_id = $request->user_id;

            $reservation->save();

            return redirect()->route('reservation.list')->with('status', 'Nueva Reserva '.$reservation->id.' Creada!');
        }

        $locations = Location::all();
        $services = Service::all();
        $users = User::all();
        return view('reservation.new',['locations' => $locations, 'services' => $services, 'users' => $users]);
    }

    function edit(Request $request, $id) 
    {
        $reservation = Reservation::find($id);
        if ($request->isMethod('post')) {
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'service_id' => 'required|exists:services,id',
                'location_id' => 'required|exists:location,id',
                'user_id' => 'required|exists:users,id',
            ]);

            $reservation->start_date = $request->start_date;
            $reservation->end_date = $request->end_date;
            $reservation->service_id = $request->service_id;
            $reservation->location_id = $request->location_id;
            $reservation->user_id = $request->user_id;

            $reservation->save();

            return redirect()->route('reservation.list')->with('status', 'Reserva '.$reservation->id.' Modificada!');
        }

        $locations = Location::all();
        $services = Service::all();
        $users = User::all();
        return view('reservation.edit',['reservation' => $reservation, 'locations' => $locations, 'services' => $services, 'users' => $users]);
    }

    function delete($id) 
    { 
        $reservation = Reservation::find($id);
        $reservation->delete();

        return redirect()->route('reservation.list')->with('status', 'Reserva '.$reservation->id.' Eliminada!');
    }
}

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
            if ($reservation->participants == 0) {
                $title = $reservation->user->name .' - Mantenimiento';
            } else {
                $title = $reservation->user->name . ' - Participantes: ' . $reservation->participants;
            }
            $reservations[] = [
                'title' => $title,
                'start' => $reservation->start_date,
                'end' => $reservation->end_date,
            ];
        }
        return view('calendar.calendar',compact('reservations'));
    }

    function list(Request $request){

        $filterValue = $request->input("filterValue");
        $reservationFilter = Reservation::select('reservations.*')
        ->join('users', 'reservations.user_id', '=', 'users.id')
        ->where('users.name', 'like', '%' . $filterValue . '%');

        $filterLocalidad = $request->input("filterLocalidad");
        if ($filterLocalidad) {
            $reservationFilter->whereHas('location', function ($query) use ($filterLocalidad) {
                $query->where('name', 'LIKE', '%'.$filterLocalidad.'%');
            });
        }

        $reservation = $reservationFilter->paginate(10);
        $locations = Location::all();

        return view('reservation.list' , ['reservation' => $reservation, 'filterValue' => $filterValue, 'filterLocalidad' => $filterLocalidad, 'locations' => $locations]);
    }

    function new(Request $request){

        if ($request->isMethod('post')) {
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'service_id' => 'required|exists:services,id',
                'location_id' => 'required|exists:location,id',
                'participants' => 'required',
                'user_id' => 'required|exists:users,id',
            ]);

            $reservation = new Reservation;
            $reservation->start_date = $request->start_date;
            $reservation->end_date = $request->end_date;
            $reservation->service_id = $request->service_id;
            $reservation->location_id = $request->location_id;
            $reservation->participants = $request->participants;
            $reservation->user_id = $request->user_id;

            $reservation->save();

            return redirect()->route('reservation.list')->with('status', 'Nueva Reserva con id '.$reservation->id.' Creada!');
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
                'participants' => 'required',
                'user_id' => 'required|exists:users,id',
            ]);

            $reservation->start_date = $request->start_date;
            $reservation->end_date = $request->end_date;
            $reservation->service_id = $request->service_id;
            $reservation->location_id = $request->location_id;
            $reservation->participants = $request->participants;
            $reservation->user_id = $request->user_id;

            $reservation->save();

            return redirect()->route('reservation.list')->with('status', 'Reserva con id '.$reservation->id.' Modificada!');
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

        return redirect()->route('reservation.list')->with('status', 'Reserva con id '.$reservation->id.' Eliminada!');
    }

    public function reserva(Request $request)
{
    if ($request->isMethod('post')) {
        // Validar los datos del formulario de reserva
        $request->validate([
            'location_id' => 'required',
            'service_id' => 'required',
            'date' => 'required|date',
            'selected_hour' => 'required', // Esta es la hora seleccionada para la reserva
            'participants' => 'required|integer|min:2|max:6', // Validación para el campo de participantes
            // Otros campos de validación si es necesario
        ]);

        // Crear una nueva reserva con los datos proporcionados
        $reservation = new Reservation();
        $reservation->location_id = $request->location_id;
        $reservation->service_id = $request->service_id;
        $reservation->start_date = $request->date . ' ' . $request->selected_hour;
        // Calcular la hora de finalización (por ejemplo, agregando una hora a la hora de inicio)
        $endDateTime = \DateTime::createFromFormat('Y-m-d H:i', $request->date . ' ' . $request->selected_hour);
        $endDateTime->add(new \DateInterval('PT1H')); // Agregar una hora a la hora de inicio
        $reservation->end_date = $endDateTime->format('Y-m-d H:i:s');
        $reservation->participants = $request->participants;
        $reservation->user_id = \Auth::id(); // Agregar el número de participantes
        // Otros campos de la reserva si es necesario
        // Guardar la reserva en la base de datos
        $reservation->save();

        // Redirigir a una página de reserva después de guardar la reserva
        return redirect()->route('client.user-reservation')->with('status', 'Reserva confirmada con exito!');;
    }

    // Si la solicitud no es de tipo POST, simplemente mostrar el formulario de reserva
    $locations = Location::all();
    $services = Service::all();

    $selectedLocation = $request->input('localidad'); // Capturamos el parámetro 'localidad'

    return view('client.reserva', ['locations' => $locations, 'services' => $services, 'selectedLocation' => $selectedLocation]);
}



    public function getAvailableHours(Request $request)
    {
        // Obtener la fecha seleccionada y las IDs de ubicación y servicio
        $selectedDate = $request->selected_date;
        $locationId = $request->location_id;
        //$serviceId = $request->service_id;
    
        // Obtener todas las reservas para la ubicación y el servicio seleccionados en la fecha seleccionada
        $reservations = Reservation::whereDate('start_date', $selectedDate)
            ->where('location_id', $locationId)
            //->where('service_id', $serviceId)
            ->get();
    
        // Inicializar un arreglo para almacenar las horas disponibles
        $availableHours = [];
    
        // Definir tu horario personalizado
        $customSchedule = [
            ["09:00", "10:00"],
            ["10:00", "11:00"],
            ["11:00", "12:00"],
            ["12:00", "13:00"],
            ["16:00", "17:00"],
            ["17:00", "18:00"],
            ["18:00", "19:00"],
            ["19:00", "20:00"]
        ];
    
        // Iterar sobre cada intervalo de hora en tu horario personalizado
        foreach ($customSchedule as $interval) {
            $startHour = $interval[0];
            $endHour = $interval[1];
    
            // Crear objetos DateTime para la hora de inicio y fin del intervalo
            $startDateTime = \DateTime::createFromFormat('Y-m-d H:i:s', "$selectedDate $startHour:00");
            $endDateTime = \DateTime::createFromFormat('Y-m-d H:i:s', "$selectedDate $endHour:00");
    
            // Verificar si el intervalo está disponible (no reservado)
            $isAvailable = true;
    
            // Iterar sobre todas las reservas para verificar si el intervalo está reservado
            foreach ($reservations as $reservation) {
                $reservationStart = \DateTime::createFromFormat('Y-m-d H:i:s', $reservation->start_date);
                $reservationEnd = \DateTime::createFromFormat('Y-m-d H:i:s', $reservation->end_date);
    
                // Verificar si el intervalo se superpone con alguna reserva existente
                if (!($endDateTime <= $reservationStart || $startDateTime >= $reservationEnd)) {
                    // El intervalo está reservado, marcar como no disponible
                    $isAvailable = false;
                    break; // Salir del bucle de reservas
                }
            }
    
            // Si el intervalo está disponible, agregarlo al arreglo de horas disponibles
            if ($isAvailable) {
                // Agregar el intervalo al arreglo de horas disponibles
                $availableHours[] = ["start" => $startHour, "end" => $endHour];
            }
        }
    
        // Devolver las horas disponibles como respuesta JSON
        return response()->json(['available_hours' => $availableHours]);
    }
    

    public function userReservation(){
        $user = \Auth::user();

        $reservations = Reservation::where('user_id', $user->id)
            ->orderBy('created_at','desc')
            ->paginate(5);

        return view('client.user-reservation', ['reservations' => $reservations]);
    }

    function reservationClientDelete($id) 
    { 
        $reservation = Reservation::find($id);
        if($reservation->user_id !== \Auth::id()){
            return redirect()->route('client.user-reservation')->with('error', 'No tienes permisos para eliminar esta reserva.');
        }
        $reservation->delete();

        return redirect()->route('client.user-reservation')->with('status', 'Reserva Anulada con Éxito');
    }


}


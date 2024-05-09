<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function privacidad(){
        return view('client.privacidad');
    }

    public function reserva(){
        return view('client.reserva');
    }
}

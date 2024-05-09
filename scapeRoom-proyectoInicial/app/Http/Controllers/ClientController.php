<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function privacidad(){
        return view('client.privacidad');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function enviarMensaje(Request $request)
    {
        $datosMensaje = [
            'nombre' => $request->firstName,
            'apellidos' => $request->lastName,
            'email' => $request->email,
            'telefono' => $request->phone,
            'mensaje' => $request->message
        ];

        Mail::to('bieloscarlucas.escaperoom@gmail.com')->send(new ContactFormMail($datosMensaje));

        return view('contact')->with('message', '¡El correo electrónico se ha enviado correctamente!');
    }
}
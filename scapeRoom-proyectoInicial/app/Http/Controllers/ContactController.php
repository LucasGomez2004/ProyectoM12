<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function enviarMensaje(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'firstName' => 'required|regex:/^[a-zA-Z]+$/',
                'lastName' => 'required|regex:/^[a-zA-Z]+$/',
                'email' => 'required|email',
                'phone' => 'required|string|max:9',
                'message' => 'required|string|max:255',
            ]);

        $datosMensaje = [
            'nombre' => $request->firstName,
            'apellidos' => $request->lastName,
            'email' => $request->email,
            'telefono' => $request->phone,
            'mensaje' => $request->message
        ];

        Mail::to('bieloscarlucas.escaperoom@gmail.com')->send(new ContactFormMail($datosMensaje));

        return redirect()->route('contact')->with('message', '¡El correo electrónico se ha enviado correctamente!');
    }
}

}
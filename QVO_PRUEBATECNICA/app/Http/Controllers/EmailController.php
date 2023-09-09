<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;

class EmailController extends Controller
{
    ///Metodo que se encarga de enviar el correo
    public function enviarCorreo()
    {
        $user = Auth::user();
        $email = $user->email;
        $response = Mail::to($email)->send(new Notification);
        return back()->with('success', 'El correo se envió correctamente.');
    }
}

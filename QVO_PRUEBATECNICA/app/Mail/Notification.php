<?php

namespace App\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {

    }

    public function attachments(): array
    {
        return [];
    }

    ///Metodo que construye el correo
    public function build(){

        $nombreRuta = request()->route()->getName();
        Log::info('Nombre de la ruta: ' . $nombreRuta);

 
        if ($nombreRuta === 'crear.store') {
            return $this->view('plantillaEmailCreate')
                ->from("TareasQVO@Colombia.com")
                ->subject("Notificación de creacion de tareas");
        }
        else{
            return $this->view('plantillaEmail')
            ->from("TareasQVO@Colombia.com")
            ->subject("Notificación de cambio en tareas");
        }


    }
}

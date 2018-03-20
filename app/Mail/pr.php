<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class pr extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    

    public function __construct($correo, $contra)
    {
        //
        $this->mail = $correo;
        $this->pass = $contra;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.datos')
                    ->with('mail', $this->mail)
                     ->with('pass', $this->pass)
                    ->from('kevinsoteegarcia@outlook.com', 'Kevin Garcia')
                    ->subject('Datos sistema equipos de trabajo');
    }
}

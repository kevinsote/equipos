<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mail\pr;
use Illuminate\Support\Facades\Mail;


class Mailtool extends Model
{
    //
    public static function enviar($correo, $contra){
    	Mail::to($correo) 
    	->send (new pr($correo, $contra));
    }
}
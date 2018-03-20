<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rol', 'contra',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function validar_planner($correo, $password){   //valida que el correo y contraseña sean de un planeador
       Log::info('valor de la variable correo:');
        Log::info($correo);
        Log::info('valor de la variable password:');
        Log::info($password);


        $consulta = DB::table('users')
        ->select('id')
        ->where([
            ['email','=',$correo],
            ['contra','=',$password],
            ['rol','=','2'],
        ])
        ->get(); 

        Log::info('valor de la variable consulta:');
        Log::info($consulta);

        if($consulta == '[]'){

            return false;
        }  

        else {
            return true;
        }
    }
}

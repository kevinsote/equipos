<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Log;

class Pagos extends Model
{
    //
    protected $table = "pagos";
   

    public function Empleados(){
    	return $this->belongsTo('Empleados');
    }
    
    protected $fillable = ['id','empleado','fecha','laboral','retardos','asistencia','sanciones','incapacidad','ant','seg','commwip','nva','qsa_calidad','cump_lap','cont_lap','mnc','scrap','asistencia_valor','gms','total'];

    public static function todos(){
        $cons = DB::table('pagos')
        ->join('empleados','pagos.nomina','=','empleados.nomina')
        ->join('equipos','empleados.equipo','=','equipos.id')
        ->join('lgts','equipos.lgt','=','lgts.id')
        ->join('departamentos','empleados.st','=','departamentos.id')
        ->select('pagos.*','empleados.nombre as nombre_emp','empleados.pe as pe','equipos.nombre as nombre_equi','departamentos.nombre as nombre_dep','departamentos.area as area_dep','lgts.nombre as nombre_lgt')
        ->get();  

     
        Log::info('la consulta inner es');
        Log::info($cons);

           return $cons;
        }

    public static function to_excel(){
        return DB::table('pagos')
                ->select('nomina','fecha','laboral','retardos','asistencia','sanciones','incapacidad','ant','seg','commwip','nva','qsa_calidad','cump_lap','cont_lap','mnc','scrap','asistencia_valor','gms','total')
                ->get();

    }
}

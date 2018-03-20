<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Log;

class Empleados extends Model
{
    //
    protected $table = "empleados";
    
    public function Pagos(){
    	return $this->hasMany('Pagos');
    }

    public function Equipos(){
    	return $this->belongsTo('Equipos');
    }

     public function Departamentos(){
        return $this->belongsTo('Departamentos');
    }
    
    protected $fillable = ['id','nombre','nomina','equipo','pe','st','categoria','tripulacion'];


    public static function borrar($id ){
        return DB::table('empleados')
        ->select('id')
        ->where('id','=',$id)
        ->delete();
   }

    public static function integrantes_equipos_departamentos(){
        $cons = DB::table('empleados')
        ->join('equipos','empleados.equipo','=','equipos.id')
        ->join('departamentos','empleados.st','=','departamentos.id')
        ->select('empleados.*','empleados.nombre as nombre_emp','equipos.nombre as nombre_equi','departamentos.nombre as nombre_dep')
        ->get();  

     
        Log::info('la consulta inner es');
        Log::info($cons);

           return $cons;
        }



}

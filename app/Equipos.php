<?php

namespace App;
use DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    //
    protected $table = "equipos";
    
    public function Empleados(){
    	return $this->hasMany('Empleados');
    }

    public function LGTs(){
    	return $this->belongsTo('LGTs');
    }
    
    protected $fillable = ['id','nombre','lgt'];

    public static function id_name(){
    return DB::table('equipos')
        ->select('id','nombre')
        ->orderby('nombre','DESC')
        ->get();
    }

    public static function equipos_lgts(){
        $cons = DB::table('equipos')
        ->join('lgts','equipos.lgt','=','lgts.id')
        ->select('equipos.*','lgts.nombre as nombre_lgt')
        ->get(); 

          return $cons;
            }
    


    public static function borrar($id ){
        return DB::table('equipos')
        ->select('id')
        ->where('id','=',$id)
        ->delete();
   }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Departamentos extends Model
{
    //
	protected $table = "departamentos";

    public function Empleados(){
    	return $this->hasMany('Empleados');
    }
    
    protected $fillable = ['id','nombre','area'];

public static function id_name(){
	return DB::table('departamentos')
		->select('id','nombre')
        ->orderby('nombre','DESC')
		->get();
}

 public static function borrar($id ){
        return DB::table('departamentos')
        ->select('id')
        ->where('id','=',$id)
        ->delete();
   }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LGTs extends Model
{
    //
    protected $table = "lgts";
    
    public function Equipos(){
    	return $this->hasMany('Equipos');
    }
    
    protected $fillable = ['id','nombre'];


public static function id_name(){
	return DB::table('lgts')
		->select('id','nombre')
		->orderby('nombre','DESC')
		->get();
}

}

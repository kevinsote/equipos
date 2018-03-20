<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Redirect;

class DepartamentoController extends Controller
{
    //
    public function alta(){

    	return view ('departamentos.alta');
    }


    public function tabla(){
         $x = \App\Departamentos::all();
           $mensaje = "bien";

    	return view ('departamentos.tabla', compact('x'));
    }

    public function store(Request $data){
			    		\App\Departamentos::create([
			            'nombre' => $data['nombre'],
			            'area' => $data['area'],
			        ]);
			    	//	return view ('empleados.si');
                        return view ('departamentos.alta');
		    	}


    public function eliminar(Request $data){

                \App\Departamentos::borrar($data->id);
                    return Redirect::to('/dep_tabla');
        }

     public function modificar(Request $ids){
            $data = \App\Departamentos::find($ids->id);
            $data['men'] = 'edit';
            return view ('departamentos.alta_with_data', compact('data'));
        }

     public function update(Request $request)
                {
                            $x= \App\Departamentos::find($request->id);
                                                    $x->fill($request->all());
                                                    $x->save();
                                                    return Redirect::to('/dep_tabla');                        
                   }                 


}

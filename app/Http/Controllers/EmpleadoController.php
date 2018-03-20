<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Redirect;


class EmpleadoController extends Controller
{
    //
     public function alta(){
     	
     	$consulta_equ = \App\Equipos::id_name();
     	   $consulta_dep = \App\Departamentos::id_name();
    	return view ('empleados.alta',compact('consulta_equ','consulta_dep'));
    }

     public function tabla(){
           $x = \App\Empleados::integrantes_equipos_departamentos();
           $mensaje = "bien";
    	return view ('empleados.tabla',compact('x','mensaje'));
    }

    public function store(Request $data){

    	if(Auth::user()->rol == 3){                                              //si es LGT que realice el proceso de validacion del planner
						    	$is_planner = \App\User::validar_planner($data['correo_planner'],$data['contrasena_planner']);


						    	if ($is_planner == true){
							    		\App\Empleados::create([
							            'nombre' => $data['nombre'],
							            'nomina' => $data['nomina'],
							            'equipo' => $data['equipo'],
							            'pe' => $data['punta_estrella'],
							            'st' => $data['st'],
							            'categoria' => $data['categoria'],
							            'tripulacion' => $data['tripulacion']
							        ]);
							    		return view ('empleados.si');
						    	}

						    	else {
						    		                                          //si no es planner regresa la misma vista con mensaje de error

						    		$consulta_equ = \App\Equipos::id_name();  //pa llenar el select de equipos
                                    $consulta_dep = \App\Departamentos::id_name();
				                     $data['men'] = 'mal';
				                     Log::info("valor de data1");
				                     Log::info($data);
						    		return view('empleados.alta_whit_data',compact('data','consulta_equ','consulta_dep'));		    	     
						    		 }
		    }
		    else {											//si no es LGT hace el registro directo
		    	\App\Empleados::create([
			            'nombre' => $data['nombre'],
			            'nomina' => $data['nomina'],
			            'equipo' => $data['equipo'],
			            'pe' => $data['punta_estrella'],
			            'st' => $data['st'],
			            'categoria' => $data['categoria'],
			            'tripulacion' => $data['tripulacion']
			        ]);
			    		return view ('empleados.si');
		    }

    }


    public function eliminar(Request $data){

        if(Auth::user()->rol == 3){   //si el lgt
            	$is_planner = \App\User::validar_planner($data['correo_planner'],$data['contrasena_planner']);

            	if ($is_planner == true){
        	    	\App\Empleados::borrar($data->id);
        	    		return Redirect::to('/int_tabla');
            	}
            	else{
            		$mensaje = "mal";
            		 $x = \App\Empleados::integrantes_equipos_departamentos();
            			return view('empleados.tabla',compact('mensaje','x'));
            	}
            }
         else {
                \App\Empleados::borrar($data->id);
                        return Redirect::to('/int_tabla');
            }
    }





    public function modificar(Request $ids){
    	$data = \App\Empleados::find($ids->id);
        Log::info('resultado del find x id');
        Log::info($data);
    	$data['men'] = 'edit';
    	$consulta_equ = \App\Equipos::id_name();  //pa llenar el select de equipos
         $consulta_dep = \App\Departamentos::id_name();
    	return view ('empleados.alta_whit_data', compact('data','consulta_equ','consulta_dep'));
    }

    public function update(Request $request)
    {
    	Log::info('id a actualizar');
        Log::info($request->id);

        if(Auth::user()->rol == 3){   //si el lgt
                    $is_planner = \App\User::validar_planner($request['correo_planner'],$request['contrasena_planner']);

                    if ($is_planner == true){
                                        $x= \App\Empleados::find($request->id);
                                        Log::info('registro a actualizar');
                                        Log::info($x);
                                        $x->fill($request->all());
                                        $x->save();
                                        return Redirect::to('/int_tabla');
                                    }
                                    else{
                                            $consulta_equ = \App\Equipos::id_name();  //pa llenar el select de equipos
                                             $consulta_dep = \App\Departamentos::id_name();
                                                $data = $request;
                                                 $data['men'] = 'mal_update';
                                                 Log::info("valor de data1");
                                                 Log::info($data);
                                                return view('empleados.alta_whit_data',compact('data','consulta_equ','consulta_dep'));                  
                                                 }
            }
            else{           //si no es lgt
                $x= \App\Empleados::find($request->id);
                                        Log::info('registro a actualizar');
                                        Log::info($x);
                                        $x->fill($request->all());
                                        $x->save();
                                        return Redirect::to('/int_tabla');

            }                         
       



       }                 

    

}

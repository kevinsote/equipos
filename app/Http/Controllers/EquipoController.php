<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Redirect;

class EquipoController extends Controller
{
    //
    public function alta(){

    	$consulta_lgt = \App\LGTs::id_name();



    	return view ('equipos.alta',compact('consulta_lgt'));
    }

     public function tabla(){
        $x = \App\Equipos::equipos_lgts();
           $mensaje = "bien";
    	return view ('equipos.tabla', compact('x','mensaje'));
    }

       public function store(Request $data){
        if(Auth::user()->rol == 3){                                       //si es LGT que realice el proceso de validacion del planner
                	    	$is_planner = \App\User::validar_planner($data['correo_planner'],$data['contrasena_planner']);


                	    	if ($is_planner == true){
                		    		\App\Equipos::create([
                		            'nombre' => $data['nombre'],
                		            'lgt' => $data['lgt']
                		        ]);
                		    		return view ('empleados.si');
                	    	}

                	    	else {                                      //si no es planner regresa la misma vista con mensaje de error


                                $consulta_lgt = \App\LGTs::id_name();


                                 $data['men'] = 'mal';
                                 Log::info("valor de data1");
                                 Log::info($data);
                	    		return view('equipos.alta_with_data',compact('data','consulta_lgt'));
                	    	      }
            }
            else{                                                   //si no es LGT hace el registro directo
                        \App\Equipos::create([
                                    'nombre' => $data['nombre'],
                                    'lgt' => $data['lgt']
                                ]);
                                    return view ('empleados.si');

            }
    }


         public function eliminar(Request $data){


        if(Auth::user()->rol == 3){   //si el lgt

                        $is_planner = \App\User::validar_planner($data['correo_planner'],$data['contrasena_planner']);

                        if ($is_planner == true){
                            \App\Equipos::borrar($data->id);
                                return Redirect::to('/equ_tabla');
                        }
                        else{
                            $mensaje = "mal";
                            $x = \App\Equipos::equipos_lgts();
                                return view('equipos.tabla',compact('mensaje','x'));
                        }
                }
            else{
                         \App\Equipos::borrar($data->id);
                                return Redirect::to('/equ_tabla');
                  }
            }
        


         public function modificar(Request $ids){
                $data = \App\Equipos::find($ids->id);
                $data['men'] = 'edit';
                $consulta_lgt = \App\LGTs::id_name();
                return view ('equipos.alta_with_data', compact('data','consulta_lgt'));
            }


        public function update(Request $request)
                {
                    if(Auth::user()->rol == 3){   //si el lgt
                                $is_planner = \App\User::validar_planner($request['correo_planner'],$request['contrasena_planner']);

                                if ($is_planner == true){
                                                    $x= \App\Equipos::find($request->id);
                                                    $x->fill($request->all());
                                                    $x->save();
                                                    return Redirect::to('/equ_tabla');
                                                }
                                                else{
            
                                                        $consulta_lgt = \App\LGTs::id_name();
                                                            $data = $request;
                                                             $data['men'] = 'mal_update';
                                                            return view('equipos.alta_with_data',compact('data','consulta_lgt'));                  
                                                             }
                        }
                        else{           //si no es lgt
                            $x= \App\Equipos::find($request->id);
                                                    $x->fill($request->all());
                                                    $x->save();
                                                    return Redirect::to('/equ_tabla');

                        }                         
                   }                 

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

class PagoController extends Controller
{
    //
     public function tabla(){
         $y = \App\Pagos::todos();
  
    	return view ('pagos.tabla', compact('y'));
    }

public function modificar(Request $ids){
            $data = \App\Pagos::find($ids->id);
            $data['men'] = 'edit';
            return view ('pagos.alta_whit_data', compact('data'));
        }

     public function update(Request $request)
                {
                            $x= \App\Pagos::find($request->id);
                                                    $x->fill($request->all());
                                                    $x->save();
                                                    return Redirect::to('/pag_tabla');                        
                   }                 

}

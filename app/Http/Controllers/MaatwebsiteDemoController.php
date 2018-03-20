<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Pagos;
use Excel;
use Illuminate\Support\Facades\DB;


class MaatwebsiteDemoController extends Controller
{


/**
     * Return View file
     *
     * @var array
     */
public function importExport()
{
return view('importExport');
}


/**
     * File Export Code
     *
     * @var array
     */
public function downloadExcel()
{
	$data = Pagos::all()->toArray();
	return Excel::create('Pagos', function($excel) use ($data) {
									$excel->sheet('mySheet', function($sheet) use ($data)
									        {
									$sheet->fromArray($data);
									        });
									})->download('xlsx');
}


/**
     * Import file into database Code
     *
     * @var array
     */
public function importExcel(Request $request)
{

DB::table('pagos')->truncate();


	if($request->hasFile('import_file')){
		$path = $request->file('import_file')->getRealPath();


		$data = Excel::load($path, function($reader) {})->get();


		if(!empty($data) && $data->count()){


					foreach ($data->toArray() as $key => $value) {
						if(!empty($value)){
							foreach ($value as $v) {
								$insert[] = ['nomina' => $v['nomina'], 'laboral' => $v['laboral'], 'retardos' => $v['retardos'], 'asistencia' => $v['asistencia'], 'sanciones' => $v['sanciones'], 'incapacidad' => $v['incapacidad'], 'ant' => $v['ant'], 'seg' => $v['seg'], 'commwip' => $v['commwip'],'nva' => $v['nva'], 'qsa_calidad' => $v['qsa_calidad'], 'cump_lap' => $v['cump_lap'], 'cont_lap' => $v['cont_lap'], 'mnc' => $v['mnc'], 'scrap' => $v['scrap'], 'asistencia_valor' => $v['asistencia_valor'], 'gms' => $v['gms'], 'total' => $v['total'], 'fecha' => $v['fecha']];
							}
						}
					}


					if(!empty($insert)){
						foreach (array_chunk($insert,3000) as $t) {
							# code...
							Pagos::insert($t);
						}
							

						return back()->with('success','Insert Record successfully.');
						}


		}


	}


	return back()->with('error','Please Check your file, Something is wrong there.');
}


}
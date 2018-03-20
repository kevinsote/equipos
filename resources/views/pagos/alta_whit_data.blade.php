
@extends('layouts.app')

@section('content')


@if ($data->men == 'mal')
  <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Usuario y/o contraseña del planner incorrectos.
</div>
@elseif ($data->men == 'mal_update')
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Usuario y/o contraseña del planner incorrectos.
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pagos</div>
                <div class="panel-body">
                    
                    <form class="form-horizontal" name="menu" action="{{ route('update_pago') }}" method="post">
                       
                        {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{$data->id}}">
                         <div  >
                        <table class="table table-hover" style="overflow: auto; width:100%; height:500px;">
                            <tr>
                                <td>Nomina</td>
                                <td><input type="number" name="nomina" value="{{$data->nomina}}" required></td>
                            </tr>
                            <tr>
                                <td>Fecha</td>
                                <td><input type="date" name="fecha" value="{{$data->fecha}}" required></td>
                            </tr>
                            <tr>
                                <td>Laboral</td>
                                <td><input type="text" name="laboral" value="{{$data->laboral
                                }}" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Retardos</td>
                                <td><input type="text" name="retardos" value="{{$data->retardos}}" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Asistencia</td>
                                <td><input type="text" name="asistencia" value="{{$data->asistencia}}" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Sanciones</td>
                                <td><input type="text" name="sanciones" value="{{$data->sanciones}}" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Incapacidad</td>
                                <td><input type="text" name="incapacidad" value="{{$data->ant}}" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Ant</td>
                                <td><input type="text" name="ant" value="{{$data->ant}}" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Seg</td>
                                <td><input type="text" name="seg" value="{{$data->seg}}" required onchange="myFunction()">
                                </td>
                            </tr>
                            <tr>
                                <td>Commwip</td>
                                <td><input type="text" name="commwip" value="{{$data->commwip}}" required onchange="myFunction()">
                                </td>
                            </tr>
                            <tr>
                                <td>NVA</td>
                                <td><input type="text" name="nva" value="{{$data->nva}}" required onchange="myFunction()">
                                </td>
                            </tr>
                            <tr>
                                <td>QSA / CALIDAD</td>
                                <td><input type="text" name="qsa_calidad" value="{{$data->qsa_calidad}}" required onchange="myFunction()">
                                </td>
                            </tr>
                            <tr>
                                <td>CUMP LAP</td>
                                <td><input type="text" name="cump_lap" value="{{$data->cump_lap}}" required onchange="myFunction()">
                                </td>
                            </tr>
                            <tr>
                                <td>CONT LAP</td>
                                <td><input type="text" name="cont_lap" value="{{$data->cont_lap}}" required onchange="myFunction()">
                                </td>
                            </tr>
                            <tr>
                                <td>MATERIAL NO CONFIABLE</td>
                                <td><input type="text" name="mnc" value="{{$data->mnc}}" required onchange="myFunction()">
                                </td>
                            </tr>
                            <tr>
                                <td>SCRAP</td>
                                <td><input type="text" name="scrap" value="{{$data->scrap}}" required onchange="myFunction()">
                                </td>
                            </tr>
                            <tr>
                                <td>ASISTENCIA</td>
                                <td><input type="text" name="asistencia_valor" value="{{$data->asistencia_valor}}" required onchange="myFunction()">
                                </td>
                            </tr>
                            <tr>
                                <td>GMS</td>
                                <td><input type="text" name="gms" value="{{$data->gms}}" required onchange="myFunction()">
                                </td>
                            </tr>
                            <tr>
                                <td>TOTAL A PAGAR</td>
                                <td><input type="text" name="total" value="{{$data->total}}" required>
                                </td>
                            </tr>
                        </table>
                    </div>
                        @if ($data->men == 'edit' || $data->men == 'mal_update')

                        <input type="submit" value="Actualizar">
                        @else
                        <input type="submit" value="Cargar">
                        @endif
                    </form> 
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
function myFunction() {
    var suma = eval(document.menu.seg.value) + eval(document.menu.commwip.value) + eval(document.menu.nva.value) + eval(document.menu.qsa_calidad.value) + eval(document.menu.cump_lap.value) + eval(document.menu.cont_lap.value) + eval(document.menu.mnc.value) + eval(document.menu.scrap.value) + eval(document.menu.asistencia_valor.value) + eval(document.menu.gms.value);
  document.menu.total.value = suma;
}

    </script>
@endsection

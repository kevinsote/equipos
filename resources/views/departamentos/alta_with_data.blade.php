@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mayordomía</div>
                <div class="panel-body">
                    <form class="form-horizontal" name="menu" action="{{ route('update_departamento') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <table class="table table-hover">
                            <tr>
                                <td>Nombre</td>
                                <td><input type="text" name="nombre" required value="{{$data->nombre}}"></td>
                            </tr>
                              <tr>
                                <td>Área</td>
                                <td><select name="area" required>
                                        <option value="" selected disabled hidden>Escoge una opción</option>
                                        <option value="Bancos de prueba">Bancos de prueba</option>
                                        <option value="Big green">Big green</option>
                                        <option value="Calidad">Calidad</option>
                                        <option value="Calidad trs">Calidad trs</option>
                                        <option value="Carcasa">Carcasa</option>
                                        <option value="Carrier input">Carrier input</option>
                                        <option value="Carrier reaction">Carrier reaction</option>
                                        <option value="Carrocerías">Carrocerías</option>
                                        <option value="Engranes GF9">Engranes GF9</option>
                                        <option value="Ensamble General">Ensamble General</option>
                                        <option value="Estampado">Estampado</option>
                                        <option value="GF9 sub ensambles">GF9 sub ensambles</option>
                                        <option value="GSC trs">GSC trs</option>
                                        <option value="Kaizen">Kaizen</option>
                                        <option value="Kaizen trs">Kaizen trs</option>
                                        <option value="Línea principal 2">Línea principal 2</option>
                                        <option value="Main line">Main line</option>
                                        <option value="Mantenimiento prismáticos">Mantenimiento prismáticos</option>
                                        <option value="Mantenimiento trs GF6">Mantenimiento trs GF6</option>
                                        <option value="Mantenimiento trs GF9">Mantenimiento trs GF9</option>
                                        <option value="Maq Carcasa">Maq Carcasa</option>
                                        <option value="Maq Cuerpo de Valvulas">Maq Cuerpo de Valvulas</option>
                                        <option value="Maq piñones duros">Maq piñones duros</option>
                                        <option value="Maq piñones verdes">Maq piñones verdes</option>
                                        <option value="Materiales">Materiales</option>
                                        <option value="Pintura">Pintura</option>
                                        <option value="Piñones duros machining">Piñones duros machining</option>
                                        <option value="Prismáticos GF9">Prismáticos GF9</option>
                                        <option value="Soporte central">Soporte central</option>
                                        <option value="Subensamble">Subensamble</option>
                                        <option value="Transmisiones">Transmisiones</option>
                                        <option value="Valve Body">Valve Body</option>
                                        <option value="Valve Body Assy GF10">Valve Body Assy GF10</option>
                                        <option value="Valve Body Assy GF9">Valve Body Assy GF9</option>
                                        <option value="Valve Body Machining GF9">Valve Body Machining GF9</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <input type="submit" value="Actualizar">
                    </form> 
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

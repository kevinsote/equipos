@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Integrantes</div>
                <div class="panel-body">
                    <form class="form-horizontal" name="menu" action="{{ route('guardar_integrante') }}" method="post">
                        {{ csrf_field() }}
                        <table class="table table-hover">
                            <tr>
                                <td>Nombre</td>
                                <td><input type="text" name="nombre" required></td>
                            </tr>
                            <tr>
                                <td>Nomina</td>
                                <td><input type="number" name="nomina" required></td>
                            </tr>
                            <tr>
                                <td>Equipo</td>
                                <td><select name="equipo" required>
                                        <option value="" selected disabled hidden>Escoge una opción</option>
                                        @foreach($consulta_equ as $equ)
                                        <option value="{{$equ->id}}">{{$equ->nombre}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Punta estrella</td>
                                <td><select name="punta_estrella" required>
                                        <option value="" selected disabled hidden>Escoge una opción</option>
                                        <option value="Seguridad">Seguridad</option>
                                        <option value="Gente">Gente</option>
                                        <option value="Respuesta">Respuesta</option>
                                        <option value="Calidad">Calidad</option>
                                        <option value="Ambiental">Ambiental</option>
                                        <option value="Costo">Costo</option>
                                        <option value="LET">LET</option>
                                        <option value="Ninguno">Ninguno</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>ST</td>
                                  <td><select name="st" required>
                                        <option value="" selected disabled hidden>Escoge una opción</option>
                                        @foreach($consulta_dep as $dep)
                                        <option value="{{$dep->id}}">{{$dep->nombre}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Categoria</td>
                                <td><select name="categoria" required>
                                        <option value="" selected disabled hidden>Escoge una opción</option>
                                        <option value="SK A">SK A</option>
                                        <option value="SK B">SK B</option>
                                        <option value="SK C">SK C</option>
                                        <option value="TM A">TM A</option>
                                        <option value="TM AP">TM AP</option>
                                        <option value="TM B">TM B</option>
                                        <option value="TM BEC">TM BEC</option>
                                        <option value="TM C">TM C</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Tripulación</td>
                                 <td><select name="tripulacion" required>
                                        <option value="" selected disabled hidden>Escoge una opción</option>
                                        <option value="L10">L10</option>
                                        <option value="L11">L11</option>
                                        <option value="L12">L12</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </td>
                            </tr>      
                        </table>
                        @if(Auth::user()->rol == 3)
                        <label>Datos del planner</label>
                        <table class="table table-hover">
                            <tr>
                                <td>E mail</td>
                                <td><input type="text" name="correo_planner" required></td>
                            </tr>
                             <tr>
                                <td>Contraseña</td>
                                <td><input type="password" name="contrasena_planner" required></td>
                            </tr>
                        
                        </table>
                        @endif
                        <input type="submit" value="Cargar">
                    </form> 
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

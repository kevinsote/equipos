@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Equipos</div>
                <div class="panel-body">
                    <form class="form-horizontal" name="menu" action="{{ route('guardar_equipo') }}" method="post">
                        {{ csrf_field() }}
                        <table class="table table-hover">
                            <tr>
                                <td>Nombre</td>
                                <td><input type="text" name="nombre" required></td>
                            </tr>
                            <tr>
                            <tr>
                                <td>LGT</td>
                                <td><select name="lgt" required>
                                        <option value="" selected disabled hidden>Escoge una opción</option>
                                        @foreach($consulta_lgt as $lgtss)
                                        <option value="{{$lgtss->id}}">{{$lgtss->nombre}}</option>
                                        @endforeach
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

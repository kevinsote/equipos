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
                <div class="panel-heading">Equipos</div>
                <div class="panel-body">
                    @if ($data->men == 'mal')
                    <form class="form-horizontal" name="menu" action="{{ route('guardar_equipo') }}" method="post">
                    @else
                    <form class="form-horizontal" name="menu" action="{{ route('update_equipo') }}" method="post">
                    @endif    
                        {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{$data->id}}">
                        <table class="table table-hover">
                             <tr>
                                <td>Nombre</td>
                                <td><input type="text" name="nombre" required value="{{$data->nombre}}"></td>
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
                                <td><input type="text" name="correo_planner" value="" required></td>
                            </tr>
                             <tr>
                                <td>Contraseña</td>
                                <td><input type="password" name="contrasena_planner" value="" required></td>
                            </tr>
                        </table>
                        @endif
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
@endsection

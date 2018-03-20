@extends('layouts.app')

@section('content')
@if ($mensaje == "mal")
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Usuario y/o contraseña del planner incorrectos.
</div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Equipos</div>
                <div class="panel-body">
                    Palabra a buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />
                    <div style="overflow: auto; width:100%; height:400px;">
                    <table class="table table-hover" id="datos">
                        <thead>
                            <th>Nombre</th>
                            <th>LGT</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            @foreach ($x as $row)
                            <tr>
                                <td>{{$row->nombre}}</td>
                                <td>{{$row->nombre_lgt}}</td>
                                <td>
                                    <form action="{{route('eliminar_equipo')}}" method="post">
                                        {{ csrf_field() }}
                                          @if(Auth::user()->rol == 3)
                                         <a data-toggle="modal" href="#{{$row->id}}"  class="btn btn-danger" >Eliminar</a>
                                       
                                                                    <div class="modal fade" id="{{$row->id}}" role="dialog">
                                                                      <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                          <div class="modal-header">
                                                                            <h3>Ingrese datos del planner</h3>
                                                                          </div>
                                                                          <div class="modal-body">
                                                                            <label>E mail</label>
                                                                            <input type="mail" name="correo_planner">
                                                                            <label>Contraseña</label>
                                                                            <input type="password" name="contrasena_planner">
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                            <input type="hidden" name="id" value="{{$row->id}}">
                                                                            <input type="submit" value="Aceptar">
                                                                          </div>
                                                                        </div>  
                                                                      </div>
                                                                    </div>     
                                                                  </div>
                                                                  @else
                                                                <input type="hidden" name="id" value="{{$row->id}}">
                                                                <input type="submit" value="Eliminar">
                                                            @endif
                                              
                                    </form>
                                    
                                    <br>
                                    <form action="{{ route('modificar_equipo') }}" method="post">
                                        {{ csrf_field() }}
                                                                            <input type="hidden" name="id" value="{{$row->id}}">
                                                                            <input type="submit" value="Modificar">                        
                                    </form>
                                
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>  
                    </div> 
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
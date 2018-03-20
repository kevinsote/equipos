@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mayordomía</div>
                <div class="panel-body">
                    Palabra a buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />
                    <div style="overflow: auto; width:100%; height:400px;">
                     <table class="table table-hover" id="datos">
                        <thead>
                            <th>ST</th>
                            <th>Área</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            @foreach ($x as $row)
                            <tr>
                                <td>{{$row->nombre}}</td>
                                <td>{{$row->area}}</td>
                                <td>
                                    <form action="{{route('eliminar_departamento')}}" method="post">
                                        {{ csrf_field() }}
                                         <input type="hidden" name="id" value="{{$row->id}}">
                                                                <input type="submit" value="Eliminar">
                                    </form>
                                    
                                    <br>
                                    <form action="{{ route('modificar_departamento') }}" method="post">
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

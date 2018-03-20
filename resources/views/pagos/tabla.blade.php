@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pagos</div>
                <div class="panel-body">
                    Palabra a buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />
                    <div >
                   <table  id="datos" style="overflow: auto; width:100%; height:400px;">
                        <thead>
                            <th>Nómina</th>
                            <th>Nombre</th>
                            <th>Equipo</th>
                            <th>PE</th>
                            <th>ST</th>
                            <th>Área</th>
                            <th>LGT</th>
                            <th>Fecha</th>
                            <th>Total a pagar</th>
                            <th>Acción</th>
                        </thead>
                        <tbody>
                            @foreach ($y as $x)
                            <tr>
                                <td>{{$x->nomina}}</td>
                                <td>{{$x->nombre_emp}}</td>
                                <td>{{$x->nombre_equi}}</td>
                                <td>{{$x->pe}}</td>
                                <td>{{$x->nombre_dep}}</td>
                                <td>{{$x->area_dep}}</td>
                                <td>{{$x->nombre_lgt}}</td>
                                <td>{{$x->fecha}}</td>
                                <td>{{$x->total}}</td>
                                 <td>
                                    <form action="{{ route('modificar_pago') }}" method="post">
                                        {{ csrf_field() }}
                                                                            <input type="hidden" name="id" value="{{$x->id}}">
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
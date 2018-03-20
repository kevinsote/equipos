@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Menú principal</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="row">
                    <div class="col-md-3">
                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Integrantes <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('alta_integrantes') }}">
                                            Alta
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tabla_integrantes') }}">
                                            Modificar o elminar
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            </div>
                            <div class="col-md-3">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Equipos <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('alta_equipos') }}">
                                            Alta
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tabla_equipos') }}">
                                            Modificar o elminar
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            </div>
                            @if(Auth::user()->rol == 1)
                            <div class="col-md-3">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Mayordomía <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('alta_departamentos') }}">
                                            Alta
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tabla_departamentos') }}">
                                            Modificar o elminar
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            </div>
                    </div>
                    <br><br><br>
                    <div class="row">
                                <!-- Aqui empieza el boton cargar -->
                            <div class="col-md-6">
                                <form action="{{ route('carga_excel') }}" method="post" enctype="multipart/form-data">
                                    <input type="file" name="import_file" required />
                                    {{ csrf_field() }}
                                    <br/>
                                    <button class="btn btn-primary">Cargar pagos</button>
                                </form>
                                </div>
                                <div class="col-md-3">
                                <a href="{{ route('tabla_pagos') }}">
                                            Editar pagos
                                        </a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('descarga_excel') }}">
                                            Descargar excel 
                                        </a>
                            </div>

                    </div>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

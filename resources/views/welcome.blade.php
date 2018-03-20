<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Equipos de trabajo</title>
         <link rel="shortcut icon" href="{{asset('imagenes/logo-favicon.jpg')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script language="javascript">
                function doSearch()
                {
                    var tableReg = document.getElementById('datos');
                    var searchText = document.getElementById('searchTerm').value.toLowerCase();
                    var cellsOfRow="";
                    var found=false;
                    var compareWith="";
         
                    // Recorremos todas las filas con contenido de la tabla
                    for (var i = 1; i < tableReg.rows.length; i++)
                    {
                        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                        found = false;
                        // Recorremos todas las celdas
                        for (var j = 0; j < cellsOfRow.length && !found; j++)
                        {
                            compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                            // Buscamos el texto en el contenido de la celda
                            if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
                            {
                                found = true;
                            }
                        }
                        if(found)
                        {
                            tableReg.rows[i].style.display = '';
                        } else {
                            // si no ha encontrado ninguna coincidencia, esconde la
                            // fila de la tabla
                            tableReg.rows[i].style.display = 'none';
                        }
                    }
                }
         </script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: black;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                font-color: black;
            }

             tr, td, h3{
                color:black;
                 font-weight: bolder;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: black;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            th {
                      border-collapse: collapse;
                      border: blue solid;
                    }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Ingresar</a>
                       
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Equipos de trabajo
                </div>
                <img src="imagenes/logo-favicon.jpg" width="150px">
                <br>
                <div class="flex-center">
                    <div>Nomina a buscar<input id="searchTerm" type="text" onkeyup="doSearch()" /></div>

                </div>
                <br>
                <div class="content" style="overflow: auto; width:100%; height:500px;">
                     <table  id="datos">
                        <thead>
                            <th>Nómina</th>
                            <th>Nombre</th>
                            <th>Equipo</th>
                            <th>PE</th>
                            <th>ST</th>
                            <th>Área</th>
                            <th>LGT</th>
                            <th>Fecha</th>
                            <th>Laboral</th>
                            <th>Retardos</th>
                            <th>Asistencia</th>
                            <th>Sanciones</th>
                            <th>Incapacidad</th>
                            <th>ANT</th>
                            <th>SEG</th>
                            <th>COMMWIP</th>
                            <th>NVA</th>
                            <th>QSA / Calidad</th>
                            <th>CUMP LAP</th>
                            <th>CONT LAP</th>
                            <th>MAT NO CONF</th>
                            <th>SCRAP</th>
                            <th>Asistencia</th>
                            <th>GMS</th>
                            <th>Total a pagar</th>
                        </thead>
                        <tbody>
                            @foreach ($pagos as $x)
                            <tr>
                                <td>{{$x->nomina}}</td>
                                <td>{{$x->nombre_emp}}</td>
                                <td>{{$x->nombre_equi}}</td>
                                <td>{{$x->pe}}</td>
                                <td>{{$x->nombre_dep}}</td>
                                <td>{{$x->area_dep}}</td>
                                <td>{{$x->nombre_lgt}}</td>
                                <td>{{$x->fecha}}</td>
                                <td>{{$x->laboral}}</td>
                                <td>{{$x->retardos}}</td>
                                <td>{{$x->asistencia}}</td>
                                <td>{{$x->sanciones}}</td>
                                <td>{{$x->incapacidad}}</td>
                                <td>{{$x->ant}}</td>
                                <td>{{$x->seg}}</td>
                                <td>{{$x->commwip}}</td>
                                <td>{{$x->nva}}</td>
                                <td>{{$x->qsa_calidad}}</td>
                                <td>{{$x->cump_lap}}</td>
                                <td>{{$x->cont_lap}}</td>
                                <td>{{$x->mnc}}</td>
                                <td>{{$x->scrap}}</td>
                                <td>{{$x->asistencia_valor}}</td>
                                <td>{{$x->gms}}</td>
                                <td>{{$x->total}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>   



                    
                   
                
                </div>
                </div>
            </div>
       
    </body>
</html>

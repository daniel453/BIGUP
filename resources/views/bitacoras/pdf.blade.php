<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bitacora {{Auth::user()->name}}</title>
    <style>
        .container{
            font-family: sans-serif;
            background-color: #A4A09F;
            padding: 40px;
        }
        .container-informe{
            background-color: white;
            padding: 20px;
        }
        .card-soldado{
            border: 1px solid#323232;
            padding: 20px;
            margin-bottom: 80px;
        }
        table{
            border: 1px solid #323232;
        }
        table thead{
            border-bottom: 1px solid #323232;
        }
        .fila{
            border: 1px solid #323232;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="container-informe">
            <h2 class="text-2xl"><b>Bitacora:</b></h2>
            <p><b>Nombre:</b> {{Auth::user()->name}}</p>
            <p><b>Apellido:</b> {{Auth::user()->apellido}}</p>
            <p><b>Novedad:</b> {{$request->novedad}}</p>
        </div>
        <h2 class="text-2xl"><b>Turnos a cargo del {{Auth::user()->rol()}} {{Auth::user()->name}} {{Auth::user()->apellido}}:</b></h2>
        <br>
        <div class="cont-card-soldado">
            <table>
                <thead>
                    <tr>
                        <th><b>Nombre:</b></th>
                        <th><b>Apellido:</b></th>
                        <th><b>Compañia</b></th>
                        <th><b>Horario:</b></th>
                        <th><b>Fecha:</b></th>
                        <th><b>Ubicacion:</b></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($turnos as $turnos)
                <tr>
                    <td class="fila">{{$turnos->user_soldado()->name}}</td>
                    <td class="fila">{{$turnos->user_soldado()->apellido}}</td>
                    <td class="fila">{{$turnos->user_soldado()->compañia()->nombre_compania}}</td>
                    <td class="fila">{{$turnos->horario}}</td>
                    <td class="fila">{{$turnos->fecha}}</td>
                    <td class="fila">{{$turnos->ubicacion}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
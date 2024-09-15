<!doctype html>
<html lang="es">
<head>
    {{--<meta charset="UTF-8">--}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Vacantes</title>
</head>

<style>

    .tabla{
        width: 100%;
        text-align: left;
        border-collapse: collapse;
        margin-top: 10px;
    }
    .cabecera{
        background-color: #0D47A1;
        color: white;
    }

    .encabezado{
        margin-top: 5px;
        margin-bottom: 5px;
        font-size: 20px;
    }

    .subTitulo{
        margin-top: 0;
        margin-bottom: 5px;
        text-align: center;
        color: #0D47A1;
        font-weight: bold;
    }

    .titulo{
        margin-top: 15px;
        font-size: 18px;
        margin-bottom: 5px;
        text-align: center;
    }

    td,th{
        border: 1px solid #939090;
        white-space: normal;
    }

    td{
        font-size: 13px;
    }

    .imagen{
        display: flex;
        justify-content: center;
    }

    .right{
        float: right;
        width: 80%;
        margin-top: 10px;
    }

    .left{
        position:relative;
        float: left;
        width: 20%;
        padding-bottom: 100px;
    }

</style>

<body>

<div class="right">
    <h2 class="encabezado">DIRECCIÓN GENERAL DEL ÁREA ACADÉMICA ECONÓMICO-ADMINISTRATIVA</h2>
    <h4 class="subTitulo">{{$dependencia}}</h4>
</div>

<div class="left">
    <img src="<?php echo $uv ?>" width="120px">
</div>

<h4 class="titulo">Reporte Experiencias Educativas Vacantes</h4>

<div>
    <table class="tabla">
        <thead class="cabecera">
        <tr>
            <th>Programa</th>
            <th>Horas</th>
            <th>Materia</th>
            <th>Grupo</th>
        </tr>
        </thead>

        <tbody>
        @foreach($listaVacantes as $vacante)
            <tr>

                <td>
                    {{$vacante->numPrograma}}-{{DB::table('zona__dependencia__programas')->where('clave_programa',$vacante->numPrograma)->value('nombre_programa')}}
                </td>

                <td>
                    {{$vacante->numHoras}}
                </td>

                <td>
                    {{$vacante->numMateria}} - {{$vacante->nombreMateria}}
                </td>

                <td>
                    {{DB::table('motivos')->where('numeroMotivo',$vacante->numMotivo)->value('nombre')}}
                </td>

            </tr>
            @endforeach

            </tbody>
    </table>
</div>

</div>
</body>
</html>

<!doctype html>
<html lang="es">
<head>
    {{--<meta charset="UTF-8">--}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Docentes</title>
</head>

<style>

    .tabla{
        width: 100%;
        text-align: left;
        border-collapse: collapse;
    }
    .cabecera{
        background-color: royalblue;
        color: white;
    }

    h4{
        text-align: center;
    }

    td,th{
        border: 1px solid #939090;
    }

    tbody tr:nth-child(odd) {
        background-color: white;
        text-align: left;
        border: 1px solid #ddd;
    }

    tbody tr:nth-child(even) {
        background-color: rgba(246, 240, 240, 0.72);
        border: 1px solid #ddd;
    }

</style>

<body>
    <h4>Dirección General del Área Académica Económico-Administrativo</h4>

    <div>
        <table class="tabla">
            <thead class="cabecera">
                <tr>
                    <th>N° de personal</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
            @if(count($listaDocentes)<=0)
                <tr>
                    <td>
                        No se han encontrado docentes
                    </td>
                </tr>
            @else
                @foreach($listaDocentes as $docente)
                    <tr>

                        <th>
                            {{$docente->nPersonal}}
                        </th>

                        <td>
                            {{$docente->nombre}}
                        </td>

                        <td >
                            {{$docente->apellidoPaterno}}
                        </td>

                        <td>
                            {{$docente->apellidoMaterno}}
                        </td>

                        <td>
                            {{$docente->email}}
                        </td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

</body>
</html>

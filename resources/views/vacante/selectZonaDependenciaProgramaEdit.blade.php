
        <div class="col-span-6 sm:col-span-2 lg:col-span-2">
            <label for="zona-dropdown" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Zona</label>
            <select  id="zona-dropdown" name="numZona" class="estiloSelect" required>
                <option value="{{$vacante->region_code}}">{{$vacante->region_code}}~{{$nombreZonaVacante}}</option>
                @foreach ($zonas as $data)
                    <option value="{{$data->code}}">
                        {{$data->code}}~{{$data->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-span-6 sm:col-span-2 lg:col-span-2">
            <label for="dependencia-dropdown" class="block mb-2 text-sm  text-gray-900 dark:text-gray-400" >Dependencia</label>
            <select id="dependencia-dropdown" class="estiloSelect" name="numDependencia">
                <option value="{{$vacante->departament_code}}">{{$vacante->departament_code}}~{{$nombreDependenciaVacante}}</option>
                @foreach ($listaDependencias as $data)
                    <option value="{{$data->code}}">
                        {{$data->code}}~{{$data->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-span-6 sm:col-span-2 lg:col-span-2">
            <label for="programa-dropdown" class="block mb-2 text-sm  text-gray-900 dark:text-gray-400" >Programa Educativo</label>
            <select id="programa-dropdown" class="estiloSelect" name="numPrograma">
                <option value="{{$vacante->educational_program_code}}">{{$vacante->educational_program_code}}~{{$nombreProgramaEducativo}}</option>
                @foreach ($listaProgramas as $data)
                    <option value="{{$data->program_code}}">
                        {{$data->program_code}}~{{$data->name}}
                    </option>
                @endforeach
            </select>
        </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#zona-dropdown').on('change', function () {
            var zonaSeleccionada = this.value;
            var zonaSeleccionadaCompleta = zonaSeleccionada.split('~');
            var idZonaSeleccionada = zonaSeleccionadaCompleta[0];
            $("#dependencia-dropdown").html('');
            $("#programa-dropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-dependenciaVacante')}}",
                type: "POST",
                data: {
                    idZona: idZonaSeleccionada,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $.each(result.dependenciaVacante, function (key, value) {
                        $("#dependencia-dropdown").append('<option value="' + value.clave_dependencia + '">' + value.clave_dependencia +"~"+ value.nombre_dependencia + '</option>');
                    });
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#dependencia-dropdown').on('change', function () {
            var dependenciaSeleccionada = this.value;
            var dependenciaSeleccionadaCompleta = dependenciaSeleccionada.split('~');
            var idDependenciaSeleccionada = dependenciaSeleccionadaCompleta[0];
            $("#programa-dropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-programaVacante')}}",
                type: "POST",
                data: {
                    idDependencia: idDependenciaSeleccionada,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $.each(result.programaVacante, function (key, value) {
                        $("#programa-dropdown").append('<option value="' + value.clave_programa + '">' + value.clave_programa +"~"+ value.nombre_programa + '</option>');
                    });
                }
            });
        });
    });
</script>


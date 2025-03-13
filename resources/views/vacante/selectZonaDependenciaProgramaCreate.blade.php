<div class="col-span-6 sm:col-span-2 lg:col-span-2">
    <label for="zona-dropdown" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Zona</label>
    <select id="zona-dropdown" name="numZona" class="estiloSelect" required>
        <option value="">Selecciona la zona</option>
        @foreach ($zonas as $data)
            <option value="{{$data->code}}">
                {{$data->code}}~{{$data->name}}
            </option>
        @endforeach
    </select>
</div>

<div class="col-span-6 sm:col-span-2 lg:col-span-2">
    <label for="dependencia-dropdown" class="block mb-2 text-sm text-gray-900 dark:text-gray-400">Dependencia</label>
    <select id="dependencia-dropdown" class="estiloSelect" name="numDependencia" required disabled>
        <option value="">Selecciona la dependencia</option>
    </select>
</div>

<div class="col-span-6 sm:col-span-2 lg:col-span-2">
    <label for="programa-dropdown" class="block mb-2 text-sm text-gray-900 dark:text-gray-400">Programa Educativo</label>
    <select id="programa-dropdown" class="estiloSelect" name="numPrograma" required disabled>
        <option value="">Selecciona el programa educativo</option>
    </select>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#zona-dropdown').on('change', function () {
            var zonaSeleccionada = this.value;
            var zonaSeleccionadaCompleta = zonaSeleccionada.split('~');
            var idZonaSeleccionada = zonaSeleccionadaCompleta[0];

            $("#dependencia-dropdown").html('<option value="">Selecciona la dependencia</option>').prop('disabled', true);
            $("#programa-dropdown").html('<option value="">Selecciona el programa educativo</option>').prop('disabled', true);

            if (idZonaSeleccionada) {
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
                            $("#dependencia-dropdown").append('<option value="' + value.code + '">' + value.code + "~" + value.name + '</option>');
                        });
                        $("#dependencia-dropdown").prop('disabled', false);
                    }
                });
            }
        });

        $('#dependencia-dropdown').on('change', function () {
            var dependenciaSeleccionada = this.value;
            var dependenciaSeleccionadaCompleta = dependenciaSeleccionada.split('~');
            var idDependenciaSeleccionada = dependenciaSeleccionadaCompleta[0];

            $("#programa-dropdown").html('<option value="">Selecciona el programa educativo</option>').prop('disabled', true);

            if (idDependenciaSeleccionada) {
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
                            $("#programa-dropdown").append('<option value="' + value.program_code + '">' + value.program_code + "~" + value.name + '</option>');
                        });
                        $("#programa-dropdown").prop('disabled', false);
                    }
                });
            }
        });

        // Validar formulario antes de enviar
        $("form").on("submit", function (e) {
            if ($("#dependencia-dropdown").val() === "" || $("#programa-dropdown").val() === "") {
                alert("Por favor, selecciona una Dependencia y un Programa Educativo antes de continuar.");
                e.preventDefault();
            }
        });
    });
</script>



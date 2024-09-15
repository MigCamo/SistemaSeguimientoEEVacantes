
        <div class="mt-4">
            <label for="zona-dropdown" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Zona</label>
            <select  id="zona-dropdown" name="zona" class="estiloSelect">
                <option value="">Selecciona la zona</option>
                @foreach ($zonas as $data)
                <option value="{{$data->id}}">
                    {{$data->nombre}}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <label for="zona-dropdown" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Dependencia</label>
            <select id="dependencia-dropdown" class="estiloSelect" name="dependencia">
            </select>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {


            $('#zona-dropdown').on('change', function () {
                var idZonaSeleccionada = this.value;
                $("#dependencia-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-dependencias')}}",
                    type: "POST",
                    data: {
                        id_zona: idZonaSeleccionada,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#dependencia-dropdown').html('<option> Selecciona la dependencia</option>');
                        $.each(result.dependencias, function (key, value) {
                            $("#dependencia-dropdown").append('<option value="' + value.clave_dependencia + '">' + value.clave_dependencia + " "+ value.nombre_dependencia + '</option>');
                        });
                    }
                });
            });


        });
    </script>


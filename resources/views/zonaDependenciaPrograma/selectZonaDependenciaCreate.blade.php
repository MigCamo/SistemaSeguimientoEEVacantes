<div class="col-span-6">
    <label for="idZona-dropdown" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">N° de la zona</label>
    <select  id="idZona-dropdown" name="idZona" class="estiloSelect" required>
        <option>Selecciona el N° de la zona</option>
        @foreach ($zonas as $data)
            <option value="{{$data->id_zona}}~{{$data->nombre_zona}}">
                {{$data->id_zona}}~{{$data->nombre_zona}}
            </option>
        @endforeach
    </select>
</div>

<div class="col-span-6">
    <label for="claveDependencia-dropdown" class="block mb-2 text-sm  text-gray-900 dark:text-gray-400" >Clave de la dependencia</label>
    <select id="claveDependencia-dropdown" class="estiloSelect" name="claveDependencia">
    </select>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $('#idZona-dropdown').on('change', function () {
            var zonaSeleccionada = this.value;
            var zonaSeleccionadaCompleta = zonaSeleccionada.split('~');
            var idZonaSeleccionada = zonaSeleccionadaCompleta[0];
            $("#claveDependencia-dropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-zonaDependencia')}}",
                type: "POST",
                data: {
                    idZona: idZonaSeleccionada,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $.each(result.zonaDependencias, function (key, value) {
                        $("#claveDependencia-dropdown").append('<option value="' + value.clave_dependencia + "~" + value.nombre_dependencia + '">' + value.clave_dependencia +"~"+ value.nombre_dependencia + '</option>');
                    });
                }
            });
        });

    });

</script>






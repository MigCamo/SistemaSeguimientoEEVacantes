
        <div class="mt-4">
            <label for="region-dropdown" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">zona</label>
            <select  id="region-dropdown" name="region" class="estiloSelect">
                <option value="">Selecciona la zona</option>
                @foreach ($regionList as $region)
                <option value="{{$region->code}}">
                    {{$region->name}}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <label for="region-dropdown" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Dependencia</label>
            <select id="departament-dropdown" class="estiloSelect" name="departament">
            </select>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#region-dropdown').on('change', function () {
                var selectedRegion = this.value;
                $("#departament-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-regionDepartments')}}",
                    type: "POST",
                    data: {
                        regionCode: selectedRegion,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        if (result.departments && result.departments.length > 0) {
                            $.each(result.departments, function (key, value) {
                                $("#departament-dropdown").append(
                                    '<option value="' + value.code + '">' + value.name + '</option>'
                                );
                            });
                        } else {
                            $("#departament-dropdown").append('<option>No hay departamentos disponibles</option>');
                        }
                    },
                    error: function (xhr, status, error) {  // Revisa esta parte
                        console.error("Error en la solicitud:", error);
                        alert("Hubo un problema al cargar los departamentos.");
                    }
                });
            });
        });
    </script>


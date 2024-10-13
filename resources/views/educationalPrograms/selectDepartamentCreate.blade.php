<div class="col-span-6">
    <label for="regionCode-dropdown" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">N° de la zona</label>
    <select  id="regionCode-dropdown" name="regionCode" class="estiloSelect" required>
        <option>Selecciona el N° de la zona</option>
        @foreach ($regionList as $region)
            <option value="{{$region->code}}~{{$region->name}}">
                {{$region->code}}~{{$region->name}}
            </option>
        @endforeach
    </select>
</div>

<div class="col-span-6">
    <label for="departamentCode-dropdown" class="block mb-2 text-sm  text-gray-900 dark:text-gray-400" >Clave de la dependencia</label>
    <select id="departamentCode-dropdown" class="estiloSelect" name="departamentCode">
    </select>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        $('#regionCode-dropdown').on('change', function () {
            var selectedRegion = this.value;
            var selectedRegionComplete = selectedRegion.split('~');
            var selectedRegionCode = selectedRegionComplete[0];
            $("#departamentCode-dropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-regionDepartments')}}",
                type: "POST",
                data: {
                    regionCode: selectedRegionCode,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $.each(result.departments, function (key, value) {
                        $("#departamentCode-dropdown").append('<option value="'
                        + value.code + "~" + value.name + '">'
                        + value.code + "~" + value.name + '</option>');
                    });
                }
            });
        });
    });

</script>






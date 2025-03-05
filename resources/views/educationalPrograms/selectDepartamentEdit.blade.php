<div class="col-span-6">
    <label for="regionCode-dropdown" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">N° de la zona</label>
    <select id="regionCode-dropdown" name="regionCode" class="estiloSelect" required>
        <option value="{{$regionSelected->code}}~{{$regionSelected->name}}" selected>{{$regionSelected->code}}~{{$regionSelected->name}}</option>
        @foreach ($regionList as $data)
            @if($data->code !== $regionSelected->code)
                <option value="{{$data->code}}~{{$data->name}}">
                    {{$data->code}}~{{$data->name}}
                </option>
            @endif
        @endforeach
    </select>
</div>

<div class="col-span-6">
    <label for="departamentCode-dropdown" class="block mb-2 text-sm text-gray-900 dark:text-gray-400">Clave de la dependencia</label>
    <select id="departamentCode-dropdown" class="estiloSelect" name="departamentCode">
        <option value="{{$departamentsSelected->code}}~{{$departamentsSelected->name}}" selected>{{$departamentsSelected->code}}~{{$departamentsSelected->name}}</option>
        @foreach ($departamentList as $data)
            @if($data->code !== $departamentsSelected->code)
                <option value="{{$data->code}}~{{$data->name}}">
                    {{$data->code}}~{{$data->name}}
                </option>
            @endif
        @endforeach
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




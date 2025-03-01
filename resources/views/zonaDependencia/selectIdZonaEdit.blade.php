<div class="col-span-6">
    <label for="idZona-dropdown" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">N° de la zona</label>
    <select  id="idZona-dropdown" name="id_zona" class="estiloSelect">
        <option value="{{$dependencia->region_code}}">{{$dependencia->region_code}}~{{$nombreZona}}</option>
        @foreach ($zonas as $data)
            <option value="{{$data->code}}">
                {{$data->code}}~{{$data->name}}
            </option>
        @endforeach
    </select>
</div>




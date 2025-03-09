<div class="col-span-6">
    <label for="academic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
        Académico Titular
    </label>
    <input type="text" id="searchAcademic" placeholder="Escribe el nombre o apellido..."
           class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600"
           value="{{$vacante->academic}}"
           autocomplete="off">
    <select id="academic" name="academic"
            class="w-full mt-2 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600">
        <option value="">Selecciona al académico</option>
        @foreach ($docentes as $data)
            <option value="{{ $data->names }} {{ $data->lastname }} {{ $data->maternal_surname }} - {{ $data->staff_number }}"
                {{ ($vacante->academic == "$data->names $data->lastname $data->maternal_surname - $data->staff_number") ? 'selected' : '' }}>
                {{ $data->names }} {{ $data->lastname }} {{ $data->maternal_surname }} - {{ $data->staff_number }}
            </option>
        @endforeach
    </select>
</div>

<div class="col-span-6">
    <label for="numPersonalDocente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
        Docente Sustituto
    </label>
    <input type="text" id="searchSubstitute" placeholder="Escribe el nombre o apellido..."
           class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600"
           value="{{$docenteSeleccionado->names}} {{$docenteSeleccionado->lastname}} {{$docenteSeleccionado->maternal_surname}} - {{$docenteSeleccionado->staff_number}}"
           autocomplete="off">
    <select id="numPersonalDocente" name="numPersonalDocente"
            class="w-full mt-2 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600">
        <option value="">Selecciona al docente</option>
        @foreach ($docentes as $data)
            <option value="{{ $data->staff_number }}">
                {{ $data->names }} {{ $data->lastname }} {{ $data->maternal_surname }} - {{ $data->staff_number }}
            </option>
        @endforeach
    </select>
</div>

<script>
    $(document).ready(function() {
        function setupSearch(inputId, selectId) {
            let originalOptions = $("#" + selectId + " option").clone();

            $("#" + inputId).on("input", function() {
                let searchTerm = $(this).val().toLowerCase();

                if (searchTerm.length === 0) {
                    $("#" + selectId).html(originalOptions); // Restaurar opciones si no hay búsqueda
                    return;
                }

                $("#" + selectId).html(originalOptions.filter(function() {
                    let text = $(this).text().toLowerCase();
                    return text.includes(searchTerm); // Filtrar opciones según la búsqueda
                }));
            });

            $("#" + selectId).on("change", function() {
                let selectedOption = $(this).find("option:selected").text().trim();
                if (selectedOption !== "Selecciona al docente" && selectedOption !== "Selecciona al académico") {
                    $("#" + inputId).val(selectedOption);
                } else {
                    $("#" + inputId).val("");
                }
            });

            // Asegurar que el input muestre el valor seleccionado por defecto y actualizar el select
            let selectedOptionText = $("#" + selectId + " option:selected").text().trim();
            let selectedOptionValue = $("#" + selectId + " option:selected").val();
            let currentValue = $("#" + inputId).val().trim();

            if (currentValue === "" && selectedOptionText !== "") {
                $("#" + inputId).val(selectedOptionText);
            }

            // Asegurar que el select tenga seleccionada la opción correcta basada en el valor del input
            $("#" + selectId).val(selectedOptionValue);
        }

        // Configurar para Académico Titular
        setupSearch("searchAcademic", "academic");

        // Configurar para Docente Sustituto
        setupSearch("searchSubstitute", "numPersonalDocente");

    });
</script>

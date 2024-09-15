<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>¡Unete al equipo!</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('node_modules/flowbite/dist/flowbite.js')
    @livewireStyles
</head>
<body>

    <div class="fondo">
        <!--Menu-->
        @livewire('navigation-menu')

        <h1 class="flex items-center justify-center text-2xl mt-20">Gracias por registrarte. Ahora da click en el botón de "Aceptar invitación" del correo para unirte al equipo</h1>


    </div>

</body>
</html>

import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/* PARA MOSTRAR EL NOMBRE DEL ARCHIVO*/
var input = document.getElementById( 'file' );
var infoArea = document.getElementById( 'file-upload-filename' );
var infoAreaMsj = document.getElementById( 'file-upload-msj' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {

    // the change event gives us the input it occurred in
    var input = event.srcElement;

    // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
    var fileName = input.files[0].name;

    // use fileName however fits your app best, i.e. add it into a div
    infoArea.textContent = fileName;
    infoAreaMsj.textContent = "¡Listo para ser cargado! Ahora presiona el botón 'Cargar archivo' ";
}
/* FIN MOSTRAR EL NOMBRE DEL ARCHIVO*/

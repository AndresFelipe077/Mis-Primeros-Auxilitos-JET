$($('#check')).on('change', function () {
    if ($(this).is(':checked')) {
        $('#music').prop('muted', false)//Suena
        // ajax();
        console.log($(this).is(':checked'));
    } else {
        $('#music').prop('muted', true)//No suena
        console.log($(this).is(':checked'));
    }
});

//se utiliza $.ajax(), a la cual se le pasa un objeto {}, con la información
$.ajax({
    type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
    url:"http://mis-primeros-auxilitos-jet.com/dashboard/ajustes", //url guarda la ruta hacia donde se hace la peticion
    data:{}, // data recive un objeto con la informacion que se enviara al servidor
    success:function(datos){ //success es una funcion que se utiliza si el servidor retorna informacion
         console.log(datos.promedio)
     },
    dataType: null // El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
})

// $(document).ready(function () {
//     $('#check').click(function () {
//         $.post('http://localhost:8000/dashboard/ajustes', function (htmlexterno) {
//             $("#cargaexterna").html(htmlexterno);
//         });
//     });
// });

// function mute() {
//     var aud = document.getElementById("music");
//     var check = switchCheck.checked;
// if (check) {
//     aud.muted = false;//Se escucha
//     console.log(check)
//     ajax();
// }
// else {
//     if (aud.muted == false) {
//         aud.muted = true;//No se escucha
//     }
//     console.log(check)
// }
// }

// function ajax() {
//     const http = new XMLHttpRequest();
//     const url = 'http://mis-primeros-auxilitos-jet.com/dashboard/ajustes';

//     http.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             console.log(this.responseText);

//         }
//     }

//     http.open("GET", url);
//     http.send();

// }
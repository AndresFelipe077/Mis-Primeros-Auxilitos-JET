function previewImage(event, querySelector) {

    //Recuperamos el input que desencadeno la acción
    const input = event.target;

    //Recuperamos la etiqueta img donde cargaremos la imagen
    $imgPreview = document.querySelector(querySelector);


    // Verificamos si existe una imagen seleccionada
    if (!input.files.length) return

    //Recuperamos el archivo subido
    file = input.files[0];

    //Creamos la url
    objectURL = URL.createObjectURL(file);

    //Modificamos el atributo src de la etiqueta img

    $imgPreview.src = objectURL;



}

// function ocultar() {
//     document.getElementById('video-tag').style.display = 'none';
// }

// const div = document.querySelector("imgPreview");

// document.querySelector("#file-upload").addEventListener("click", () => {
//     document.getElementById('file-upload').style.display = 'none';
// });

// document.querySelector("#file-upload").addEventListener("click", () => {
//     document.getElementById('file-upload').style.display = 'block';
// });
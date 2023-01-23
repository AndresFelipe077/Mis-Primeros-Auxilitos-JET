$('.formulario-eliminar-contenido').submit(function(e){
    e.preventDefault();


    Swal.fire({
    title: '¿Estás seguro?',
    text: "¡El contenido se eliminará definitamente 😥!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, eliminar 😰',
    cancelButtonText: 'Cancelar 😃',
  }).then((result) => {
    if (result.isConfirmed) {
      // Swal.fire(
      //   'Deleted!',
      //   'Your file has been deleted.', este texto se muestra en el index con un if
      //   'success'
      // )

      this.submit();

    }
    })
  });
$('.formulario-eliminar-contenido').submit(function (e) {
  e.preventDefault();

  Swal.fire({
    title: '¿Estás seguro?',
    text: "¡El contenido se eliminará definitamente 😥!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Sí, eliminar 😰',
    cancelButtonText: 'Cancelar 😃',
  }).then((result) => {
    if (result.isConfirmed) {
      this.submit();
    }
  })
});
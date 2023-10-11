$('.formulario-eliminar-usuario').submit(function (e) {
  e.preventDefault();

  var form = this; // Almacena una referencia al formulario

  Swal.fire({
    title: '¿Estás seguro?',
    text: "¡El usuario se eliminará definitamente 😥!",
    // icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Sí, eliminar 😰',
    cancelButtonText: 'Cancelar 😃',
  }).then((result) => {
    if (result.value) {
      form.submit();
    }
  });
});

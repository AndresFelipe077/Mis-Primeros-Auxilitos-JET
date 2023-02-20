function mostrar() {
  let preguntas = [];
  const DOMcarrito = document.querySelector('#pregunta-container');
  const DOMitems = document.querySelector('#pregunta-container');
  var num_value = document.getElementById('floatingInput').value;
  console.log(num_value)
  if(num_value == '')
  {
    alert('Por favor agrega una cantidad de preguntas')
  }
  else
  {
    for(var i = 0; i < num_value; i++)
    {
      div = document.getElementById('pregunta-container');
      div.style.display = '';
      preguntas = div * num_value;
      console.log(preguntas)
      
    }
    
  }
  
}

function renderizarPreguntas() {
  // Vaciamos todo el html
  DOMcarrito.textContent = '';
  // Quitamos los duplicados
  const carritoSinDuplicados = [...new Set(preguntas)];
  // Generamos los Nodos a partir de carrito
  carritoSinDuplicados.forEach((item) => {
      // Obtenemos el item que necesitamos de la variable base de datos
      const miItem = baseDeDatos.filter((itemBaseDatos) => {
          // ¿Coincide las id? Solo puede existir un caso
          return itemBaseDatos.id === parseInt(item);
      });
      // Cuenta el número de veces que se repite el producto
      const numeroUnidadesItem = carrito.reduce((total, itemId) => {
          // ¿Coincide las id? Incremento el contador, en caso contrario no mantengo
          return itemId === item ? total += 1 : total;
      }, 0);
      // Creamos el nodo del item del carrito
      const miNodo = document.createElement('li');
      miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
      miNodo.textContent = `${numeroUnidadesItem} x ${miItem[0].nombre} - ${miItem[0].precio}${divisa}`;
      // Boton de borrar
      const miBoton = document.createElement('button');
      miBoton.classList.add('btn', 'btn-danger', 'mx-5');
      miBoton.textContent = 'X';
      miBoton.style.marginLeft = '1rem';
      miBoton.dataset.item = item;
      miBoton.addEventListener('click', borrarItemCarrito);
      // Mezclamos nodos
      miNodo.appendChild(miBoton);
      DOMcarrito.appendChild(miNodo);
  });
 // Renderizamos el precio total en el HTML
//  DOMtotal.textContent = calcularTotal();
}




















function cerrar() {
  div = document.getElementById('pregunta-container');
  div.style.display = 'none';
}
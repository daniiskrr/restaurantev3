const valoracionesTable = document.querySelector("#valoraciones-table tbody");
//Función para mostrar las valoraciones
function mostrar() { 
  //Obtenemos el valor del filtro de nota
  const filtroNota = document.getElementById("nota").value;

  //Obtenemos el valor del filtro de orden
  const filtroOrden = document.getElementById("filtro").value;

  //Realizamos la petición GET a la API
  valoracionesTable.innerHTML = '';
  fetch('http://localhost/restaurante/api/api.php')
    .then(response => response.json())
    .then((data)  => {
      let resultado = data;
      //Filtramos los datos según la selección del usuario
      if (filtroNota) {
        resultado = resultado.filter((valoracion) => valoracion.valoracion == filtroNota);
      }

      //Ordenamos los datos según la selección del usuario
      if (filtroOrden === 'ascendente') {
        resultado.sort((a, b) => a.valoracion - b.valoracion);
      } else if (filtroOrden === 'descendente') {
        resultado.sort((a, b) => b.valoracion - a.valoracion);
      }

      //Creamos el string HTML con las valoraciones ordenadas y filtradas
      let htmlString = '';
      for (let valoracion of resultado) {
        htmlString += `
          <tr>
            <td>${valoracion.numeropedido}</td>
            <td>${valoracion.nombre} ${valoracion.apellido}</td>
            <td>${valoracion.comentario}</td>
            <td>${valoracion.valoracion}</td>
          </tr>
        `;
      }

      //Actualizamos el contenido de la tabla con las valoraciones ordenadas y filtradas
      valoracionesTable.innerHTML = htmlString;
    })
    .catch(error => console.log(error));
}

//Event listener para el filtro de nota
document.getElementById("nota").addEventListener("change", () => {
  mostrar();
});

//Event listener para el filtro de orden
document.getElementById("filtro").addEventListener("change", () => {
  mostrar();
});

//Mostramos las valoraciones al cargar la página
mostrar();

//Enviamos los datos mediante un fetch
function enviarResena() {
  //Obtenemos los elementos del formulario por su ID
  let numeropedido = document.getElementById("pedido").value;
  let nombre = document.getElementById("nombre").value;
  let apellido = document.getElementById("apellido").value;
  let comentario = document.getElementById("comentario").value;
  let valoracion = document.querySelector('input[name="valoracion"]:checked').value;


  if (!numeropedido || !nombre || !apellido || !comentario || !valoracion) {
    notie.alert({ type: 'error', text: 'Por favor, completa todos los campos.' });
  } else {
  fetch('http://localhost/restaurante/api/api.php', {
    method: 'POST',
    body: JSON.stringify({
      numeropedido: numeropedido,
      nombre: nombre,
      apellido: apellido,
      comentario: comentario,
      valoracion: valoracion
    }),
    headers: {
      'Content-type': 'application/json; charset=UTF-8',
    },
  })
  .then(response => response.json())
  .then(data => {
    if (data.type === 'success') {
      notie.alert({ type: 'success', text: data.text });
    } else {
      notie.alert({ type: 'error', text: data.text });
    }
  
    //Actualizamos la tabla de valoraciones
    fetch('http://localhost/restaurante/api/api.php')
      .then(response => response.json())
      .then(data => {
        // Creamos el string HTML con las valoraciones
        let htmlString = "";
        for (let valoracion of data) {
          htmlString += `
            <tr>
              <td>${valoracion.numeropedido}</td>
              <td>${valoracion.nombre} ${valoracion.apellido}</td>
              <td>${valoracion.comentario}</td>
              <td>${valoracion.valoracion}</td>
            </tr>
          `;
        }
        // Actualizamos el contenido de la tabla con las valoraciones
        valoracionesTable.innerHTML = htmlString;
      })
      .catch(error => console.log(error));
  })
  .catch(error => console.log(error));
}
}
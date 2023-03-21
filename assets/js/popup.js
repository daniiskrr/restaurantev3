//Función para mostrar un popup dado su ID
function mostrarPopup(id) {
    var popup = document.getElementById(id);
    popup.style.display = "block";
  }
  
  // Cierra el popup al hacer clic en el botón "Cerrar"
  var cerrarPopup = document.getElementById("cerrar-popup");
  cerrarPopup.addEventListener("click", function() {
    var popup = document.getElementById("popup-1");
    popup.style.display = "none";
  });
  
  var cerrarPopup2 = document.getElementById("cerrar-popup-2");
  cerrarPopup2.addEventListener("click", function() {
    var popup = document.getElementById("popup-2");
    popup.style.display = "none";
    localStorage.setItem("seMostroPopup2", true);
  });
  
  // Almacena el código de descuento en LocalStorage
  localStorage.setItem("codigoDescuento", "DESCUENTO10");
  
  // Si ya se ha mostrado el popup, no lo muestres de nuevo
  var seMostroPopup = localStorage.getItem("seMostroPopup");
  if (!seMostroPopup) {
    // Espera 10 segundos antes de mostrar el primer popup
    setTimeout(function() {
      mostrarPopup("popup-1");
    }, 10000);
  
    localStorage.setItem("seMostroPopup", true);
  }
  
  //Definir la variable seMostroPopup2
  var seMostroPopup2 = localStorage.getItem("seMostroPopup2");
  
  if (!seMostroPopup2) {
    //Espera 30 segundos antes de mostrar el segundo popup
    setTimeout(function() {
      //Si el ratón se aleja de la ventana del navegador, muestra el popup
      window.addEventListener("mouseout", function mostrarPopup2(event) {
        if (event.clientY < 0) {
          mostrarPopup("popup-2");
          localStorage.setItem("seMostroPopup2", true);
          //Elimina el eventListener para que no se siga ejecutando después de mostrarse el popup
          window.removeEventListener("mouseout", mostrarPopup2);
        }
      });
    }, 30000);
  }

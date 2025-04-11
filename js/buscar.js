document.addEventListener("DOMContentLoaded", function () {
    const buscador = document.getElementById("buscador");
    const filas = document.querySelectorAll("#tabla-contactos tr");
  
    buscador.addEventListener("keyup", function () {
      const filtro = buscador.value.toLowerCase();
  
      filas.forEach(fila => {
        const nombre = fila.children[0].textContent.toLowerCase();
        if (nombre.includes(filtro)) {
          fila.style.display = "";
        } else {
          fila.style.display = "none";
        }
      });
    });
  });
  
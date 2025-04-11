document.addEventListener("DOMContentLoaded", () => {
  const buscador = document.getElementById("buscador");
  const filas = document.querySelectorAll("#tabla-contactos tbody tr");

  buscador.addEventListener("input", function () {
    const texto = this.value.toLowerCase();

    filas.forEach(fila => {
      const nombre = fila.querySelector("td").textContent.toLowerCase();
      const coincide = nombre.includes(texto);
      fila.style.display = coincide ? "" : "none";
    });
  });
});

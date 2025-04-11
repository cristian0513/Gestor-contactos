document.addEventListener("DOMContentLoaded", () => {
    const botonesEliminar = document.querySelectorAll(".btn-eliminar");
    const modal = document.getElementById("modal-confirmacion");
    const btnCancelar = document.getElementById("cancelar-eliminacion");
    const btnConfirmar = document.getElementById("confirmar-eliminacion");
    const enlace = document.getElementById("confirmar-enlace");
  
    botonesEliminar.forEach((boton) => {
      boton.addEventListener("click", function (e) {
        e.preventDefault();
        const url = this.getAttribute("href");
        enlace.setAttribute("href", url);
        modal.style.display = "flex";
      });
    });
  
    btnCancelar.addEventListener("click", () => {
      modal.style.display = "none";
    });
  });
  
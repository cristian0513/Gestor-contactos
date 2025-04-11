

window.addEventListener("DOMContentLoaded", function () {
    const mensaje = document.getElementById("mensaje-exito");
    if (mensaje) {
      mensaje.style.display = "flex";
  
      setTimeout(() => {
        mensaje.style.display = "none";
        window.location.href = "ver-contactos.php";
      }, 3000);
    }
  });
  
function cerrarMensaje() {
  document.getElementById("mensaje").style.display = "none";
}

window.addEventListener("DOMContentLoaded", function () {
  const mensaje = document.getElementById("mensaje");

  if (localStorage.getItem("mostrarMensaje") === "1") {
    mensaje.style.display = "flex";
    mensaje.style.justifyContent = "center";
    mensaje.style.alignItems = "center";
    localStorage.removeItem("mostrarMensaje"); // ✅ Elimina la bandera para que no se repita
  } else {
    mensaje.style.display = "none";
  }
});

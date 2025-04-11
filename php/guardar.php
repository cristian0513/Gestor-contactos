<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "agenda_contactos");

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtener los datos enviados desde el formulario por método POST
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

// Validación simple (opcional): verificar que no estén vacíos
if (empty($nombre) || empty($email) || empty($telefono) || empty($direccion)) {
    echo "Todos los campos son obligatorios.";
    exit;
}

// Preparar la consulta SQL para insertar el contacto
$sql = "INSERT INTO contactos (nombre, email, telefono, direccion) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);

// Verificar si la preparación fue exitosa
if ($stmt === false) {
    die("Error al preparar la consulta: " . $conexion->error);
}

// Asociar los parámetros y ejecutar la consulta
$stmt->bind_param("ssss", $nombre, $email, $telefono, $direccion);

if ($stmt->execute()) {
    // ✅ Redirigir al formulario sin parámetros, pero con localStorage activado
    echo "<script>
        localStorage.setItem('mostrarMensaje', '1');
        window.location.href = '../crear.html';
    </script>";
    exit;
} else {
    echo "Error al guardar el contacto: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>

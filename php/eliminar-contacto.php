<?php
$conexion = new mysqli("localhost", "root", "", "agenda_contactos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM contactos WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ver-contactos.php?eliminado=1");
        exit;
    } else {
        echo "Error al eliminar el contacto.";
    }

    $stmt->close();
}

$conexion->close();
?>

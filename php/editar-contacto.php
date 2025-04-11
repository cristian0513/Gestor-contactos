<?php
$conexion = new mysqli("localhost", "root", "", "agenda_contactos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos actuales del contacto
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM contactos WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $contacto = $resultado->fetch_assoc();
    $stmt->close();
}

// Procesar actualización del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];

    $sql = "UPDATE contactos SET Nombre = ?, Email = ?, Telefono = ?, Direccion = ? WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssi", $nombre, $email, $telefono, $direccion, $id);

    if ($stmt->execute()) {
        header("Location: ver-contactos.php?editado=1");
        exit;
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }

    $stmt->close();
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Contacto</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>

  <main class="dashboard">
    <div class="dashboard-card">
      <!-- Flecha de regreso -->
      <a href="ver-contactos.php" class="btn-volver"><i class="fas fa-arrow-left"></i></a>

      <h1><i class="fas fa-pen"></i> Editar Contacto</h1>
      <p>Actualiza los datos del contacto seleccionado.</p>

      <form method="POST" class="formulario">

        <div class="campo">
          <i class="fas fa-user"></i>
          <input type="text" name="nombre" value="<?= htmlspecialchars($contacto['Nombre']) ?>" placeholder="Nombre completo" required>
        </div>

        <div class="campo">
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" value="<?= htmlspecialchars($contacto['Email']) ?>" placeholder="Correo electrónico" required>
        </div>

        <div class="campo">
          <i class="fas fa-phone-alt"></i>
          <input type="text" name="telefono" value="<?= htmlspecialchars($contacto['Telefono']) ?>" placeholder="Teléfono" required>
        </div>

        <div class="campo">
          <i class="fas fa-map-marker-alt"></i>
          <input type="text" name="direccion" value="<?= htmlspecialchars($contacto['Direccion']) ?>" placeholder="Dirección" required>
        </div>

        <button type="submit" class="action-btn">
          <i class="fas fa-save"></i> Guardar Cambios
        </button>
      </form>
    </div>
  </main>

</body>
</html>

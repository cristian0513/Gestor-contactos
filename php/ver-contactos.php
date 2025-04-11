<?php
$conexion = new mysqli("localhost", "root", "", "agenda_contactos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM contactos ORDER BY Nombre ASC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Contactos</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>

<!-- ✅ Mensaje flotante de edición -->
<?php if (isset($_GET['editado']) && $_GET['editado'] == 1): ?>
  <div class="mensaje-flotante" id="mensaje-exito">
    <div class="mensaje-contenido">
      <p>✅ Contacto actualizado exitosamente</p>
    </div>
  </div>
<?php endif; ?>

<main class="dashboard">
  <div class="dashboard-card">
    <a href="../index.html" class="btn-volver"><i class="fas fa-arrow-left"></i></a>
    <h1><i class="fas fa-list"></i> Lista de Contactos</h1>

    <!-- 🔍 Campo de búsqueda -->
    <div class="campo-busqueda">
      <input type="text" id="buscador" placeholder="Buscar por nombre...">
      <i class="fas fa-search icono-busqueda"></i>
    </div>

    <!-- 📋 Tabla de contactos -->
    <div class="tabla-contactos">
      <table id="tabla-contactos">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($resultado && $resultado->num_rows > 0): ?>
            <?php while($fila = $resultado->fetch_assoc()): ?>
              <tr>
                <td><?= htmlspecialchars($fila['Nombre']) ?></td>
                <td><?= htmlspecialchars($fila['Email']) ?></td>
                <td><?= htmlspecialchars($fila['Telefono']) ?></td>
                <td><?= htmlspecialchars($fila['Direccion']) ?></td>
                <td class="acciones">
                  <a href="editar-contacto.php?id=<?= $fila['id'] ?>" class="btn-editar"><i class="fas fa-pen"></i></a>
                  <a href="eliminar-contacto.php?id=<?= $fila['id'] ?>" class="btn-eliminar" onclick="return confirmarEliminacion()">
                  <i class="fas fa-trash"></i>
</a>

                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="5">No hay contactos registrados.</td></tr>
          <?php endif; ?>
          
          

        </tbody>
      </table>
      
    </div>
  </div>
</main>
<!-- 🗑️ Modal de confirmación -->
<div id="modal-confirmacion">
  <div class="modal-contenido">
    
    <p>¿Estás seguro de que quieres eliminar este contacto?<br>Esta acción no se puede deshacer.</p>
    <div class="botones-modal">
      <a id="confirmar-enlace" href="#" class="btn-confirmar">Sí, eliminar</a>
      <button id="cancelar-eliminacion" class="btn-cancelar">Cancelar</button>
    </div>
  </div>
</div>

<link rel="stylesheet" href="../css/confirmacion.css">
<!-- ✅ Scripts separados -->
<script src="../js/actualizado.js"></script>
<script src="../js/buscador.js"></script>
<script src="../js/confirmas.js"></script>

</body>
</html>

<?php $conexion->close(); ?>

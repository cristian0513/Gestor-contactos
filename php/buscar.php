<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Buscar Contacto</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>

<main class="dashboard">
  <div class="dashboard-card">
    <a href="../index.html" class="btn-volver"><i class="fas fa-arrow-left"></i></a>
    <h1><i class="fas fa-search"></i> Buscar Contacto</h1>

    <div class="campo-busqueda">
      <input type="text" id="buscador" placeholder="Buscar por nombre...">
      <i class="fas fa-search icono-busqueda"></i>
    </div>

    <div class="tabla-contactos">
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Dirección</th>
          </tr>
        </thead>
        <tbody id="tabla-contactos">
          <!-- Aquí se cargarán los contactos desde PHP -->
          <?php
          $conexion = new mysqli("localhost", "root", "", "agenda_contactos");
          if ($conexion->connect_error) {
              die("Error de conexión: " . $conexion->connect_error);
          }

          $sql = "SELECT * FROM contactos ORDER BY Nombre ASC";
          $resultado = $conexion->query($sql);

          if ($resultado && $resultado->num_rows > 0) {
              while ($fila = $resultado->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($fila['Nombre']) . "</td>";
                  echo "<td>" . htmlspecialchars($fila['Email']) . "</td>";
                  echo "<td>" . htmlspecialchars($fila['Telefono']) . "</td>";
                  echo "<td>" . htmlspecialchars($fila['Direccion']) . "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='4'>No hay contactos registrados.</td></tr>";
          }

          $conexion->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<script src="js/buscar.js"></script>
</body>
</html>

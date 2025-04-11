<?php
// Datos de conexión (ajusta si usaste otros datos en XAMPP)
$servidor = "localhost";     // Servidor donde está la BD (local en este caso)
$usuario = "root";           // Usuario por defecto de MySQL en XAMPP
$contrasena = "";            // Contraseña vacía por defecto en XAMPP
$basededatos = "agenda_contactos"; // ← Cambiado aquí

// Crear conexión usando mysqli
$conexion = new mysqli($servidor, $usuario, $contrasena, $basededatos);

// Verificamos si hay error en la conexión
if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

// Si todo va bien
// echo "✅ Conexión exitosa a la base de datos.";
?>

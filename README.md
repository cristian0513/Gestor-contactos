# 📇 Gestor de Contactos

Aplicación web para crear, visualizar, editar, eliminar y buscar contactos de forma simple y rápida.  
Ideal para practicar el manejo de formularios, operaciones CRUD con PHP y el uso de MySQL como base de datos.

## ✨ Funcionalidades
- ✅ Crear un nuevo contacto con nombre, email, teléfono y dirección
- ✅ Visualizar todos los contactos en una tabla interactiva
- ✅ Editar o eliminar contactos existentes
- ✅ Buscar contactos por nombre en tiempo real
- ✅ Confirmación visual antes de eliminar un contacto
- ✅ Interfaz moderna con diseño responsive y mensajes dinámicos

## 🛠️ Tecnologías usadas
- HTML5 + CSS3 (estructura y estilos)
- JavaScript (interacciones, confirmaciones y búsquedas)
- PHP (backend y conexión a base de datos)
- MySQL (almacenamiento de contactos)
- XAMPP (entorno local de desarrollo)

## 📂 Estructura del proyecto

gestor-contactos/ │ 
├── css/ # Estilos generales │ 
  └── style.css │ 
├── js/ # Funciones JS modularizadas │ 
    ├── actualizado.js │
    ├── mensaje.js │
    ├── buscador.js 
    └── buscar.js │ 
├── php/ # Archivos backend PHP │
    ├── buscar.php │
    ├── conexion.php │
    ├── guardar.php │
    ├── editar-contacto.php │ 
    ├── eliminar-contacto.php │ 
    └── ver-contactos.php │ 
├── crear.html 
└── index.html

sql
Copiar
Editar

## ⚙️ Requisitos para ejecutar localmente
1. Tener XAMPP instalado
2. Clonar este repositorio dentro de la carpeta `htdocs/`
3. Crear una base de datos llamada `agenda_contactos` con la siguiente tabla:

```sql
CREATE TABLE contactos (
  id INT(11) NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(100) NOT NULL,
  Email VARCHAR(100) NOT NULL,
  Telefono TEXT NOT NULL,
  Direccion VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);
Iniciar Apache y MySQL desde el panel de XAMPP

Acceder a http://localhost/gestor-contactos/

💡 Autor
Este proyecto fue desarrollado como parte de mi proceso de aprendizaje web fullstack.
Estoy mejorando mis habilidades en desarrollo PHP, manejo de bases de datos y buenas prácticas.

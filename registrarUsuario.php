<?php
session_start();

// Verifica si la sesión está activa y si el usuario tiene rol de administrador
//if (empty($_SESSION["id"]) || $_SESSION["rol"] !== 'admin') {
  //  header("location: login.php");
    //exit();
//}

// Aquí deberías incluir tu archivo de conexión a la base de datos
include_once "./model/dbconection.php";

// Verifica si se ha enviado el formulario de registro
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtén los datos del formulario
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Hash de la contraseña (deberías utilizar funciones más seguras en un entorno de producción)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepara la consulta SQL para insertar un nuevo usuario
    $sql = $conexion->prepare("INSERT INTO Usuarios (usuario, correo_electronico, telefono, contraseña, rol) VALUES (?, ?, ?, ?, ?)");

    // Vincula los parámetros y ejecuta la consulta
    $sql->bind_param("sssss", $username, $email, $phone, $hashedPassword, $role);
    $sql->execute();

    // Cierra la conexión y redirige después de agregar el nuevo usuario
    $sql->close();
    $conexion->close();
    header("location: usuarios.php"); // Reemplaza 'lista_usuarios.php' con la página donde muestras la lista de usuarios
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
    <title>Registro de Usuario</title>
</head>
<body>
<nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <!-- Agrega tu logo aquí -->
                <img src="./img/ivp-removebg-preview.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                <!-- Fin del logo -->
                <?php
               echo $_SESSION["nombre"]." ". $_SESSION["apellidos"];
                ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="controller/controlador_cerrar_sesion.php">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Registro de Nuevo Usuario</h2>
        <form method="POST" action="tu_archivo_de_procesamiento.php">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telefono</label>
                <input type="phone" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rol del Usuario</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
        </form>
    </div>
</body>
</html>

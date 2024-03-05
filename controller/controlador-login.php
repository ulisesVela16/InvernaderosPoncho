<?php
session_start();

if (!empty($_POST['btningresar'])) {
    if (!empty($_POST["Username"]) && !empty($_POST["Password"])) {
        $Username = $_POST["Username"];
        $Password = $_POST["Password"];

        // Realizar la consulta a la base de datos
        $sql = $conexion->query("SELECT * FROM Usuarios WHERE usuario='$Username' AND contraseña='$Password'");

        if ($datos = $sql->fetch_object()) {
            // Verificar el rol del usuario (por ejemplo, si tiene una columna 'rol' en la tabla)
            $rol = $datos->rol;

            if ($rol == 'admin') {
                // Usuario es administrador
                $_SESSION["id"] = $datos->id;
                $_SESSION["nombre"] = $datos->nombre;
                $_SESSION["apellidos"] = $datos->apellidos;
                header("location: Administrador.php"); // Reemplaza 'panelAdmin.php' con la página del administrador
            } elseif ($rol == 'user') {
                // Usuario es normal
                $_SESSION["id"] = $datos->id;
                $_SESSION["nombre"] = $datos->nombre;
                $_SESSION["apellidos"] = $datos->apellidos;
                header("location: panelUsuario.php"); // Reemplaza 'panelUsuario.php' con la página del usuario normal
            } else {
                echo "<div class='alert alert-danger'>Acceso Denegado</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Acceso Denegado</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Campos vacíos</div>";
    }
}
?>

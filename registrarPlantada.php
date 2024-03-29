<?php

session_start();
if (empty($_SESSION["id"])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
    <title>Registro de planta</title>
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
<br>
    <div class="container mt-5">
        <h2>Registro de Siembra en Invernadero</h2>
        <form>
            <div class="mb-3">
                <label for="dueñoSemilla" class="form-label">Nombre del Dueño de la Semilla</label>
                <input type="text" class="form-control" id="dueñoSemilla" name="dueñoSemilla" required>
            </div>
            <div class="mb-3">
                <label for="nombreSemilla" class="form-label">Nombre de la Semilla</label>
                <input type="text" class="form-control" id="nombreSemilla" name="nombreSemilla" required>
            </div>
            <div class="mb-3">
                <label for="tipoPlanta" class="form-label">Tipo de Planta</label>
                <input type="text" class="form-control" id="tipoPlanta" name="tipoPlanta" required>
            </div>
            <div class="mb-3">
                <label for="numCharolas" class="form-label">Número de Charolas</label>
                <input type="number" class="form-control" id="numCharolas" name="numCharolas" required>
            </div>
            <div class="mb-3">
                <label for="fechaSiembra" class="form-label">Fecha de Siembra</label>
                <input type="date" class="form-control" id="fechaSiembra" name="fechaSiembra" required>
            </div>
            <div class="mb-3">
                <label for="numInvernadero" class="form-label">Número de Invernadero</label>
                <input type="text" class="form-control" id="numInvernadero" name="numInvernadero" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Siembra</button>
        </form>
    </div>
    <br>
</body>
</html>

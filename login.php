<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/login.css">
  <title>Invernaderos Poncho - Iniciar Sesión</title>
  <!-- Incluir Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light"> 

  <div class="login-page">
    <div class="form">
      <div class="logo">
        <!-- Ajustar el tamaño de la imagen -->
        <img src="./img/ivp-removebg-preview.png" alt="Logo de la empresa" height="100">
      </div>
      <?php
      include "./model/dbconection.php";
        include "./controller/controlador-login.php";
        ?>
   <form method="post" class="login-form">
    <input type="text" name="Username" placeholder="Username"/>
    <input type="password" name="Password" placeholder="Password"/>
    <input name="btningresar" class="btn"type="submit" value="Iniciar sesion">
    <p class="message">¿Olvidaste tu contraseña? <a href="#">Recuperar contraseña</a></p>
</form>

    </div>
  </div>
<!-- Incluir Bootstrap JS y jQuery (opcional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

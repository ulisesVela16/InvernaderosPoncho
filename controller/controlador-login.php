<?php 
session_start();
if(!empty($_POST['btningresar'])){
    if (!empty($_POST["Username"]) and !empty($_POST["Password"])) {
        $Username=$_POST["Username"];
        $Password=$_POST["Password"];
        $sql=$conexion->query("select  * from Usuarios where usuario='$Username' and contraseña='$Password'");
        if ($datos=$sql->fetch_object()) {
            $_SESSION["id"]=$datos->id;
            $_SESSION["nombre"]=$datos->nombre;
            $_SESSION["apellidos"]=$datos->apellidos;
            header("location: panelUsuario.php");
        } else {
           echo "<div class='alert alert-danger'>Acceso Denegado</div>";
        }
        
    } else {
        echo "campos vacios";
    }
    
}


?>
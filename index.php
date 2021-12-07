<?php
session_start();
if(isset($_SESSION['admin'])){// si la sesion admin existe te dirigira a la pagina admin.php
    header("location: admin.php");
}else
if(isset($_SESSION['empleado'])){// si la sesion empleado existe te dirigira a la pagina empleado.php
    header("location: empleado.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
</head>
<body>
   <form action="php/validar.php" method="post">
   <h1 class="">Sistema de login</h1>
   <p>Usuario <input type="text" placeholder="Nombre de Usuario" name="usuario"></p>
   <p>Contraseña <input type="password" placeholder="Contraseña" name="contraseña"></p>
   <input type="submit" value="Ingresar">
   
   </form> 
</body>
</html>
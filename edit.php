<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/editar_estilo.css">
</head>

<body>
  <header class="header2">
       <div class="wrapper">
        <div class="logo">
            Editar Información
        </div>
        <nav>
            <a href="edit_user.php">Regresar</a>
            <a href="php/cerrar_sesion.php">Cerrar sesión</a>
            
        </nav>
        </div>
    </header>
    <section class="contenido wrapper">
        <div class="contenido">
   
   <form  method="POST" action="edit_a.php">
    <table border="1">
        <thead>
            <tr>
                <td>Usuario</td>
                <td>Apellido</td>
                <td>Nombre</td>
                <td>Correo</td>
                <td></td>
            </tr>
        </thead>
        <?php
                include "php/inicio_sesion.php";
                $id_rol=$_SESSION['id_rol'];
                $clave=$_GET['clave'];
                $_SESSION['clave_edit']=$clave;
                $sentencias="SELECT * FROM usuarios WHERE id_rol='$id_rol' AND id_usu='$clave' ORDER BY apellido ASC";
                $res=mysqli_query($conexion, $sentencias) or die (mysqli_error($sentencias));
 
                while($fila=mysqli_fetch_assoc($res)){
                    ?>
        <tbody>
            <tr>
                <td><input type="text" class="tx" value="<?php echo $fila['id_usu'] ?>" name="clave"></td>
                <td><input type="text" class="tx" value="<?php echo $fila['apellido'] ?>" name="apellido"></td>
                <td><input type="text" class="tx" value="<?php echo $fila['nombre'] ?>" name="nombre"></td>
                <td><input type="text" class="tx" value="<?php echo $fila['correo'] ?>" name="correo"></td>
                <td><input type="submit" class="btn_submit" value="Guardar"></td>
            </tr>
        </tbody>
        <?php         
                }
        ?>
    </table>
    </form>
    </div>
    </section>
</body>

</html>

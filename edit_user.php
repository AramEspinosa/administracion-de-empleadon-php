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
            Editar
        </div>
        <nav>
            <a href="index.php">Regresar</a>
            <a href="php/cerrar_sesion.php">Cerrar sesión</a>
            
        </nav>
        </div>
    </header>
    <section class="contenido wrapper">
        <div class="contenido">
   
   <form  method="POST">
    <table border="1">
        <thead>
            <tr>
                <td>Usuario</td>
                <td>Apellido</td>
                <td>Nombre</td>
                <td></td>
            </tr>
        </thead>
        <?php
                include "php/inicio_sesion.php";
                $id=2;
                $_SESSION['id_rol']=$id;
                $id_rol=$_SESSION['id_rol'];
                $sentencias="SELECT * FROM usuarios WHERE id_rol='$id_rol' ORDER BY apellido ASC";
                $res=mysqli_query($conexion, $sentencias) or die (mysqli_error($sentencias));
 
                while($fila=mysqli_fetch_assoc($res)){
                    ?>
        <tbody>
            <tr>
                <td><?php echo $fila['id_usu'] ?></td>
                <td><?php echo $fila['apellido'] ?></td>
                <td><?php echo $fila['nombre'] ?></td>
                <td><?php echo "<a href='edit.php?clave=".$fila['id_usu']."'><button type='button' class='btn_acces'>Editar</button></a>"?></td>
                
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

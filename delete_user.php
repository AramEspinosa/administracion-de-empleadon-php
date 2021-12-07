<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Eliminar</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/asistencias_estilo.css">
</head>

<body>
  <header class="header2">
       <div class="wrapper">
        <div class="logo">
            Eliminar Usuario
        </div>
        <nav>
            <a href="index.php">Regresar</a>
            <a href="php/cerrar_sesion.php">Cerrar sesión</a>
            
        </nav>
        </div>
    </header>
    <section class="contenido wrapper">
        <div class="contenido">
   <h1><?php echo "Eliminar"?></h1>
   <form  method="POST">
    <table border="1">
        <thead>
            <tr>
                <td>Clave</td>
                <td>Apellido</td>
                <td>Nombre</td>
                <td>Correo</td>
                <td></td>
                
            </tr>
        </thead>
        <?php
                include "php/inicio_sesion.php";
                
                $id_rol=2;
                ?>
                <input class="btneliminar" type="submit" name="btnguardar" value="Eliminar" >
                <?php
                
                $sentencias="SELECT * FROM usuarios WHERE id_rol='$id_rol' ORDER BY apellido ASC";// Se consulta los registros del grupo
                $res=mysqli_query($conexion, $sentencias) or die (mysqli_error($sentencias));
                while($fila=mysqli_fetch_assoc($res)){// Mostrara los registros del grupo seleccionado con un checkbox para marcar la asiencia
                    ?>
        <tbody>
            <tr>
                <td><?php echo $fila['id_usu'] ?></td>
                <td><?php echo $fila['apellido'] ?></td>
                <td><?php echo $fila['nombre'] ?></td>
                <td><?php echo $fila['correo'] ?></td>
                <td><input class="check_btn" type="checkbox" name="check[]" value="<?php echo $fila['id_usu']?>"></td>
            </tr>
        </tbody>
        <?php         
                }
        ?>
    </table>
    
    <?php
       
    
       if(isset($_POST['btnguardar']))
       {
           
           if(empty($_POST['check']))
           {
               echo '<h1>No se selecciono nada</h1>';
            }
            else
            {
                
                
                foreach($_POST['check'] as $clave)
                {
                    $resultado=mysqli_query($conexion, "DELETE FROM usuarios WHERE id_usu = '$clave'") or die (mysqli_error($resultado));
                    
                }
           echo'
           <script>
               alert("El registro se elimino satisfactoriamente"); 
               window.location = "index.php"
           </script>';

           exit;
            }
           }
       
           
       ?>
    </form>
    </div>
    </section>
</body>

</html>

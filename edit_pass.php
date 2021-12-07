<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/agregar_estilo.css">
</head>

<body>
  <header class="header2">
       <div class="wrapper">
        <div class="logo">
            Editar Contraseña
        </div>
        <nav>
            <a href="index.php">Regresar</a>
            <a href="php/cerrar_sesion.php">Cerrar sesión</a>
            
        </nav>
        </div>
    </header>
    <section class="contenido wrapper">
        <div class="contenido">
   
   
   <form class="formulario__register" method="POST">
   <br>
    
    
    <h2>Nueva Contraseña</h2>
    <input type="password" placeholder="" name="pass1">
    <h2>Repetir Contraseña</h2>
    <input type="password" placeholder="" name="pass2"><br>      
    <input class="btn_noguardar" type="submit" name="btn_noguardar" value="Guardar" >
    <?php
    include "php/inicio_sesion.php";   
    if(isset($_POST['btn_noguardar'])){ 
           
        if(empty($_POST['pass1'])) 
           {
               echo'
           <script>
               alert("Favor de ingresar todo los datos que se piden");
           </script>';

            }
            else 
            if(empty($_POST['pass2'])) 
           {
               echo'
           <script>
               alert("Favor de ingresar todo los datos que se piden");
           </script>';

            }
            else 
            {
           $clave=$_SESSION['empleado'];

           

           $password1=$_POST['pass1'];
           
           $password2=$_POST['pass2'];

 
           if($password2 == $password1){
           $actualizar=mysqli_query($conexion, "UPDATE usuarios SET contrasena='$password2' WHERE id_usu='$clave'");
           echo'
           <script>
               alert("Se actualizo la contraseña");
               window.location = "index.php"
           </script>';

           exit;
           }else{
           echo'
           <script>
               alert("Las contraseñas no coinciden");
           </script>';
           exit;
        }           
       }}
       ?>
    </form>
    </div>
    </section>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Agregar</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/agregar_estilo3.css">
</head>

<body>
  <header class="header2">
       <div class="wrapper">
        <div class="logo">
            Agregar Usuario
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
    <h2>Usuario</h2>
    <input type="text" placeholder="" name="clave">
    <h2>Contraseña</h2>
    <input type="password" placeholder="" name="password"><br>
    <h2>Repetir Contraseña</h2>
    <input type="password" placeholder="" name="password2"><br>
    <h2>Nombre</h2>
    <input type="text" placeholder="" name="nombre"><br>
    <h2>Apellido</h2>
    <input type="text" placeholder="" name="apellido"><br>
    <h2>Correo</h2>
    <input type="text" placeholder="" name="correo"><br>     
          
    <input class="btn_noguardar" type="submit" name="btn_noguardar" value="Guardar" >
    <?php
    $message = '';
    include "php/inicio_sesion.php";   
    if(isset($_POST['btn_noguardar'])){
           if(empty($_POST['clave'])) 
           {
               echo'
           <script>
               alert("No se a ingresado la clave");
           </script>';

            }else
           if(empty($_POST['password'])) 
           {
               echo'
           <script>
               alert("No se a ingresado la contraseña");
           </script>';

            }else
            if(empty($_POST['password2']))
           {
               echo'
           <script>
               alert("No se a repetido la contraseña");
           </script>';

            }else
            if(empty($_POST['nombre']))
           {
               echo'
           <script>
               alert("No se a ingresado el nombre");
           </script>';

            }else
            if(empty($_POST['correo']))
           {
               echo'
           <script>
               alert("No se a ingresado el correo");
           </script>';

            }else
            {
           $id_rol=2;
           $clave=$_POST['clave'];
           $password=$_POST['password'];
           $password2=$_POST['password2'];
           $nombre=$_POST['nombre'];
           $apellido=$_POST['apellido'];
           $email=$_POST['correo'];
           $hash = md5( rand(0,1000) );
           $agregar=mysqli_query($conexion, "INSERT INTO usuarios (`id_usu`, `apellido`, `nombre`, `contrasena`, `correo`, `id_rol`, `hash`) VALUES ('$clave','$apellido', '$nombre', '$password2', '$email', '$id_rol', '$hash');");
           $to      = $email;
           $subject = 'Validacion de Usuario';
           $message = '
 
           Usuario Nuevo!
           Tu cuenta ha sido creada.
           Utiliza la siguiente informacion para acceder al sitio web y cambiar tu contraseña

           Usuario: '.$clave.'
           Contraseña: '.$password2.'

 
           Por favor haz clic en este enlace para verificar que se recivio mensaje:
           http://aquivaelnombrededominio.com/php/activar.php?email='.$email.'&hash='.$hash.'
           ';
                     
           $headers = 'From:aramespinosa11@gmail.com' . "\r\n";
           mail($to, $subject, $message, $headers);

           if($password2 == $password){
           
           echo'
           <script>
               alert("Se guardo el registro y se envio un correo al usuario con link de confirmacion");
               window.location = "index.php"
           </script>';

           exit;
           }else{
           echo'
           <script>
               alert("Las contraseñas no coinciden");
           </script>';
        }}
        
       }
       ?>
    </form>
    </div>
    </section>
</body>

</html>

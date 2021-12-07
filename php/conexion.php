<?php
$usuario=$_POST['usuario'];// Se guarda el usuario y la contraseña que se ingresaron en el formulario de la pagina login.php
$contraseña=$_POST['contraseña'];
//$contrasena= hash('sha512', $contrasena);
session_start();// Se inicia sesion para poder utilizar variables de session


$conexion=mysqli_connect("localhost","root","","weport");// Se crea la conexion con el servidor local
//$conexion=mysqli_connect("sql211.epizy.com","epiz_27912302","BAnjGpvRkjhiRu","epiz_27912302_pagina_sic");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";// Se valida el usuario y la contraseña que se ingreso
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_rol']==1){ //Si el rol del usuario que se ingreso es igual 1 entonces se iniciara session Profesor
    
    $_SESSION['admin']=$usuario;
    header("location: ../admin.php");

}else
if($filas['id_rol']==2){ //Si es igual a 2 se iniciara session jefe
    
    $_SESSION['empleado']=$usuario;
    header("location: ../empleado.php");
}
else
if($filas['usuario'] != $usuario ){
    ?>
    <?php // si el usuario que se ingreso no coincide con los registros de la tabla usuarios no dara acceso a las siguientes paginas
    echo'
<script>
alert("Usuario o Contraseña incorrecta, favor de verificar tus datos");
window.location = "../index.php"
</script>';
    
    exit;
    session_destroy(); // la variable session se destruye al no coincidir los datos
    die();
    ?>
    
    <?php
}else
    if($filas['contraseña'] != $contraseña ){
    ?>
    <?php // si el usuario que se ingreso no coincide con los registros de la tabla usuarios no dara acceso a las siguientes paginas
    echo'
<script>
alert("Contraseña incorrecta, favor de verificar tus datos");
window.location = "../index.php"
</script>';
    
    exit;
    session_destroy(); // la variable session se destruye al no coincidir los datos
    die();
    ?>
    
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion); // se cierra la conexion.

//if(mysqli_num_rows($validar_login)>0){
//$_SESSION['usuario_bd']=$caja1;
//header("location: ../menu.php");
//    exit;
//}else{
//echo'
//<script>
//alert("Usuario no existe");
//window.location= "../login.php"
//</script>';
//    exit;
//}


//if(!isset($caja1['usuario'])){
//echo'
//<script>
//alert("El usuario no existe");
//window.location= "login.php";
//</script>
//';
    //header("location: login.php");
    //session_destroy();
    //die();
    
//}

//$caja2 = hash('sha512', $caja2);
//echo $caja2;
//die();



?>
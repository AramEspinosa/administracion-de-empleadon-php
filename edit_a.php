<?php
include "php/inicio_sesion.php";

$clave=$_SESSION['clave_edit'];
$clave_n=$_POST['clave'];
//$password=$_POST['password'];
//$password=hash('sha512', $password);
$apellido=$_POST['apellido'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];

$id_rol=$_SESSION['id_rol'];
//$clave_admin=$_SESSION['admin'];
//actualizar los datos

if($id_rol == 2){
    $actualizar=mysqli_query($conexion, "UPDATE usuarios SET id_usu='$clave_n', apellido='$apellido', nombre='$nombre', correo='$correo' WHERE id_usu='$clave'");

    echo'
           <script>
               alert("Se actualizo el registro");
               window.location = "edit_user.php"
           </script>';

           exit;
        }else{
        echo'
           <script>
               alert("No se pudo actualizar el registro");
               window.location = ""
           </script>';
        }


?>
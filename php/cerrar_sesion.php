<?php
session_start();//boton cerrar sesion
session_destroy();
header("location: ../index.php");

?>
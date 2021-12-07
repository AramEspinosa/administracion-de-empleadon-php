<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrador</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/menu_1.css">
</head>
<body>
    <header class="header2">
       <div class="wrapper">
        <div class="logo">
            Control de usuarios
        </div>
        <nav>
            <a href="php/cerrar_sesion.php">Cerrar sesión</a>
            
        </nav>
        </div>
    </header>
    <section class="contenido wrapper">
        <div class="contenedor__todo">
            
            <div class="contenedor" id="uno">
               <a href="add_user.php">
                <img class="icon" src="images/agregar.png" alt="">
                </a>
                <p class="texto">Agregar</p>
            </div>
            <div class="contenedor" id="dos">
               <a href="delete_user.php">
                <img class="icon" src="images/eliminar.png" alt="">
                </a>
                <p class="texto">Eliminar</p>
            </div>
            <div class="contenedor" id="tres">
               <a href="edit_user.php">
                <img class="icon" src="images/add.png" alt="">
                </a>
                <p class="texto">Editar</p>
            </div>
        </div>
    </section>
</body>
</html>
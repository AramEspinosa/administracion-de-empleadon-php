<?php
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    
    $email = mysql_escape_string($_GET['email']); 
    $hash = mysql_escape_string($_GET['hash']); 
    $email1= "aramespinosa11@gmail.com";         
    $search = mysql_query("SELECT * FROM usuarios WHERE correo='".$email."' AND hash='".$hash."' AND activo='0'") or die(mysql_error()); 
    $match  = mysql_num_rows($search);
                 
    if($match > 0){
        $to      = $email1;
           $subject = 'Validacion de Usuario';
           $message = '
 
           El usuario accedio al link
 
           
           ';
                     
           $headers = 'From:aramespinosa11@gmail.com' . "\r\n";
           mail($to, $subject, $message, $headers);
        
        mysql_query("UPDATE usuarios SET activo='1' WHERE correo='".$email."' AND hash='".$hash."' AND activo='0'") or die(mysql_error());
        echo '
        <script>
            alert("Se envio correo de confirmación de que reciviste correo"); 
            window.location = "index.php"
        </script>';

        exit;
    }else{
        
        echo '<div class="statusmsg">La URL es inválida  o ya has activado tu cuenta.</div>';
    }
}else{
    
    echo '<div class="statusmsg">Intento inválido, por favor revisa el mensaje que enviamos correo electrónico</div>';
}
?>
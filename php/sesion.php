<?php
    session_start();
    /*
        Evaluo que la sesion continue verificando una de las variables creadas en control.php, hasta
        cuando esta ya no coincida con su valor inicial se redirije al archivo salir.php
    */
        if(!$_SESSION["autentificado"]){
            header("Location: /salir");
        }else {
          $error = "error.html";
            header("Location: ../cuenta-si");
        }

?>

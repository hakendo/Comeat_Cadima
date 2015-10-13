<?php
    session_start();
    //Primero analizamos si es un usuario logeado, o no.

    if($_SESSION["AUTENTIFICADO"] == true )
    {
       //Ahora verificamos si es un administrador logeado o no, dependiendo del privilegio redireccionaremos.

        if ($_SESSION["PRIVILEGIO"] == 1)
        {
            header("Location: ../admin/loginOro.php");
        }else if($_SESSION["PRIVILEGIO"] == 2)
        {
            header("Location: ../admin/loginPlata.php");
        }else if($_SESSION["PRIVILEGIO"] == 3)
        {
            header("Location: ../admin/loginBronce.php");
        }else if($_SESSION["PRIVILEGIO"] == 4)
        {
            header("Location: ../admin/loginAdmin.php");
        }
        //En el caso de que no se cumpla con ningun parametro, veremos la página de login.
    }else
        {
            header("Location: ../login.html");
        }

    
?>
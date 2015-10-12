<?php
    session_start();
    //Primero analizamos si es un usuario logeado, o no.

    if($_SESSION["usuarioOn"] == true )
    {
        header("Location: ../usuario/principal.php");
    }

    //Ahora verificamos si es un administrador logeado o no, dependiendo del privilegio redireccionaremos.

    if ($_SESSION["privilegio"] == 1)
    {
        header("Location: ../admin/principalBronce.php");
    }else if($_SESSION["privilegio"] == 2)
    {
        header("Location: ../admin/principalPlata.php");
    }else if($_SESSION["privilegio"] == 3)
    {
        header("Location: ../admin/principalOro.php");
    }else if($_SESSION["privilegio"] == 4)
    {
        header("Location: ../admin/admin.php");
    }else
    {
        header("Location: ../login.html");
    }
    //En el caso de que no se cumpla con ningun parametro, veremos la página de login.
?>
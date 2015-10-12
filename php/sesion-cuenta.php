<?php
    session_start();
    if($_SESSION["privilegio"] == 1 )
    {
        header("Location: ../principal-admin.php");
    }else if ($_SESSION["privilegio"] == 2)
    {
        header("Location: ../principal.php");
    }else if($_SESSION["privilegio"] == 3)
    {
        header("Location: ../inicio.php");
    }else{
        header("Location: ../cuenta.html");
    }
?>
<?php
    session_start();
    session_destroy();
    //echo "se salio :(";
    header("Location: ../login.html");

?>

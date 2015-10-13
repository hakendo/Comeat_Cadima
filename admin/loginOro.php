<?php
 session_start();
	if(!$_SESSION["PRIVILEGIO"] == 1 ){
		header("Location: ../plantillas/errorPrivilegios.html");
	}
?>
<a href="../php/salir.php">CERRAR SESION</a>
<?php
	require'PDO/conexion.php';
	$objConnect = new Conexion();

	$objConnect->connect();

	$result = mysql_query('SELECT * FROM ADMINISTRADOR');
	while ($row = mysql_fetch_array($result)) {
		echo $row['NOMBRE_ADMINISTRADOR'];
	}
?>
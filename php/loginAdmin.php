<?php
	//Controlar acceso a la aplicación!
	//Consultar a la BD por el nombre de usuario y password:
	
    require'../PDO/conexion.php';
    $objConnect = new Conexion();

    $objConnect->connect();
   
    //Capturar datos de form.
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    //************************************

	//	CONSULTA PARA VERIFICAR CUENTA Y TIPO DE CUENTA (ADMIN).
	$consulta = "SELECT * FROM ADMINISTRADOR WHERE CORREO_ADMINISTRADOR ='".$correo."';";
	

	//Obtener datos personal de la persona quiere ingresar:

	$ejecutar_consulta = mysql_query($consulta) or die ("No se ha podido realizar la consulta en la BD");


	//VERIFICO SI EL USUARIO ESTA REGISTRADO:
	$valor = 0;

	if (mysql_num_rows($ejecutar_consulta) == 0)
	{ 	//El correo no está registrado
			$valor = 0;
			$objConnect->closeConect();
    }else{	

	while ($registro = mysql_fetch_array($ejecutar_consulta)) {
			
		if ($correo == $registro["CORREO_ADMINISTRADOR"] && $password == $registro["CLAVE_ADMINISTRADOR"] && $registro["PRIVILEGIO"] == 1) {
			//Inicio administrador ORO
			//INICIO LA SESION.
			session_start();
			//Declaro mis variables de sesion.
			$_SESSION["AUTENTIFICADO"]=true;
			$_SESSION["PRIVILEGIO"]=1;
			$_SESSION["NOMBRE"]= $registro["NOMBRE_ADMINISTRADOR"];
			$_SESSION["APELLIDO"]= $registro["APELLIDO_ADMINISTRADOR"];
			$_SESSION["CORREO"]= $correo;

			$valor = 1;
			$objConnect->closeConect();

		}
		if($correo == $registro["CORREO_ADMINISTRADOR"] && $password == $registro["CLAVE_ADMINISTRADOR"] && $registro["PRIVILEGIO"] == 2)
		{	
			//Inicio administrador PLATA
			//INICIO LA SESION.
			session_start();
			//Declaro mis variables de sesion.
			$_SESSION["AUTENTIFICADO"]=true;
			$_SESSION["PRIVILEGIO"]=2;
			$_SESSION["NOMBRE"]= $registro["NOMBRE_ADMINISTRADOR"];
			$_SESSION["APELLIDO"]= $registro["APELLIDO_ADMINISTRADOR"];
			$_SESSION["CORREO"]= $correo;

			$valor = 2;
			$objConnect->closeConect();

		}
		if($correo == $registro["CORREO_ADMINISTRADOR"] && $password == $registro["CLAVE_ADMINISTRADOR"] && $registro["PRIVILEGIO"] == 3)
		{
			//Inicio administrador BRONCE
			//INICIO LA SESION.
			session_start();
			//Declaro mis variables de sesion.
			$_SESSION["AUTENTIFICADO"]=true;
			$_SESSION["PRIVILEGIO"]=3;
			$_SESSION["NOMBRE"]= $registro["NOMBRE_ADMINISTRADOR"];
			$_SESSION["APELLIDO"]= $registro["APELLIDO_ADMINISTRADOR"];
			$_SESSION["CORREO"]= $correo;

			$valor = 3;
			$objConnect->closeConect();
		}
		if($correo == $registro["CORREO_ADMINISTRADOR"] && $password == $registro["CLAVE_ADMINISTRADOR"] && $registro["PRIVILEGIO"] == 4)
		{
			//Inicio administrador ADMINISTRADOR DE SISTEMA
			//INICIO LA SESION.
			session_start();
			//Declaro mis variables de sesion.
			$_SESSION["AUTENTIFICADO"]=true;
			$_SESSION["PRIVILEGIO"]=4;
			$_SESSION["NOMBRE"]= $registro["NOMBRE_ADMINISTRADOR"];
			$_SESSION["APELLIDO"]= $registro["APELLIDO_ADMINISTRADOR"];
			$_SESSION["CORREO"]= $correo;

			$valor = 4;
			$objConnect->closeConect();
		}
					
		}
		}
	
		echo $valor;
			

?>
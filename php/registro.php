<?php

//Controlar acceso a la aplicación!
    //Consultar a la BD por el nombre de usuario y password:

    include("conexion.php");
    //LOCAL
    //$conexion = abrirConexionLocal();
    //REMOTO
    $conexion = abrirConexionRemoto();

    mysql_select_db("dodoxsg1_comeatapp") or die("No se pudo seleccionar la base de datos 'comeat_db'");
    //Capturar datos de form.
    $nombre = $_POST["nombre_txt"];
    $apellidoP = $_POST["apellidoP_txt"];
    $apellidoM = $_POST["apellidoM_txt"];
    $email = $_POST["email_txt"];
    $password = $_POST["password_txt"];
    //************************************
    //Encriptar passwords:
    function encriptar($password)
    { 
    $pass_md5 = md5($password); 
    return $pass_md5;   
    }
    //*******************
    //Comenzamos a encriptar.
    $pass_md5 = encriptar($password);
    //Para validar por medio de correo ... NO->  $cod_act = substr(md5(rand()),0,16);
    //**********************************
    //Query SQL
    $SQLcomprobar = "SELECT USUARIO_CORREO FROM USUARIOS where USUARIO_CORREO= '".$email."'";
    $SQLagregar = "INSERT INTO USUARIOS VALUES (0,'".$nombre."','".$apellidoP."','".$apellidoM."','".$email."','".$password."',3);";
    $comprobar = mysql_query($SQLcomprobar);

    if (mysql_num_rows($comprobar) > 0)
    {   //El correo ya está registrado
            header("Location: ../error.html");
        }else{
            
            $agregar=mysql_query($SQLagregar); 
                if($agregar){ 
                    //Crear directorio de usuario para guardar imagenes
                    
                    if(!is_dir('../users/'.$email)) {
                     mkdir('../users/'.$email, 0755);
                    }
                    //si se agrega correctamente damos un mensaje de que se registro con exito y llamamos a la funcion enviar_email 
                     header("Location: ../registro-satisfactorio.html");
                }else{ 
                //en caso de no poder insertar el nuevo usuario dejamos un codigo de error. 
                header("Location: ../error2.html");
                    echo'Hubo Un Error Al Intentar Registrarte, Intentalo De Nuevo<br/>'; 
               } 

             }

?>
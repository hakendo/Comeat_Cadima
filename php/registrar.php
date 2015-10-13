<?php

//Controlar acceso a la aplicación!
    //Consultar a la BD por el nombre de usuario y password:
    
    require'../PDO/conexion.php';
    $objConnect = new Conexion();

    $objConnect->connect();
   


    mysql_select_db("dodoxsg1_comeatapp") or die("No se pudo seleccionar la base de datos 'comeat_db'");
    //Capturar datos de form.
    $nombres = $_POST["nombres"];
    $primerApellido = $_POST["primerApellido"];
    $segundoApellido = $_POST["segundoApellido"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    //************************************
    
    


    //Query SQL
    //Verificamos si el correo electronico ya está registrado
    $SQLcomprobar = "SELECT CORREO_USUARIO FROM USUARIO where CORREO_USUARIO= '".$email."'";
    $esRegistrado = mysql_query($SQLcomprobar);

    $SQLagregar = "INSERT INTO USUARIO VALUES ('".$email."','".$nombres."','".$primerApellido."','".$segundoApellido."','".$email."','".$password."');";

    $estado = 0;
    if (mysql_num_rows($esRegistrado) > 0)
    {   //El correo ya está registrado
            $objConnect->closeConect();
            $estado = 1;
        }else{
            
            $agregar=mysql_query($SQLagregar); 
                if($agregar){ 
                    //Crear directorio de usuario para guardar imagenes
                    if(!is_dir('../usuario/'.$email)) {
                     mkdir('../usuario/'.$email, 0755);
                    }
                    //si se agrega correctamente damos un mensaje de que se registro con exito y llamamos a la funcion enviar_email 
                    $objConnect->closeConect();
                    $estado = 2;
                }else{ 
                //en caso de no poder insertar el nuevo usuario dejamos un codigo de error. 
                    $objConnect->closeConect();
                    $estado = 3;
               } 

             }
             echo $estado;
?>
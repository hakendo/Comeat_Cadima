<?php
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//Recepción de los datos
/*
    $Nombre = $_POST['nombre_txt']; // requerido

    $Apellidos = $_POST['apellidos_txt']; // requerido

    $RazonSocial = $_POST['razon_txt']; // requerido

    $Correo = $_POST['email_txt']; // requerido

    $Telefono = $_POST['telefono_txt']; // no requerido

    $Celular = $_POST['celular_txt']; // no requerido

    $Asunto = $_POST['asunto_txt'];

    $Texto = $_POST['mensaje_txt']; // requerido
 */

//Recepcion de datos por medio de AngularJS
   //para bd mysql $data = json_decode(file_get_contents("php://input"), true);


   $data = json_decode(file_get_contents("php://input"));


    $Nombre = $data->nombres;   // requerido

    $Apellidos = $data->apellidos;  // requerido

    $RazonSocial = $data->razon; // requerido

    $Correo = $data->email;   // requerido

    $Telefono = $data->telefono;   // no requerido

    $Celular = $data->celular;   // no requerido

    $Asunto = $data->asunto;

    $Texto =  $data->mensaje;  // requerido

     //Fin de recepcion de datos
     $para = "moises.cadima@gmail.com";

      //Formulario

     $mensaje = '<html><body><p>FORMULARIO DE CONTACTO</p><table>';
     $mensaje .= '<tr><td align="right">Nombre:</td><td>'. $Nombre .'</td></tr>';
     $mensaje .= '<tr><td align="right">Apellidos:</td align="left">'.$Apellidos.'</td></tr>';
     $mensaje .= '<tr><td align="right">Raz&oacute;n social:</td align="left">'.$RazonSocial.'</td></tr>';
     $mensaje .= '<tr><td align="right">Correo:</td align="left">'.$Correo.'</td></tr>';
     $mensaje .= '<tr><td align="right">Telefono:</td align="left">'.$Telefono.'</td></tr>';
     $mensaje .= '<tr><td align="right">Celular:</td align="left">'.$Celular.'</td></tr>';
     $mensaje .= '<tr><td align="right">Asunto:</td align="left">'.$Asunto.'</td></tr>';
     $mensaje .= '<tr><td align="right">MENSAJE:</td align="left">'.$Texto.'</td></tr>';
     $mensaje .= '</table></body></html>';

    // Para dar un buen formato al correo electrónico
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


    // Mail
    mail($para, $Asunto, $mensaje, $headers);
    //echo $message pagina;
    header("Location: ../FormEnviado.html");
?>


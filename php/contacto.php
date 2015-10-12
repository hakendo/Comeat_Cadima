<?php
  
//Recepción de los datos

    $Nombre = $_POST['nombres']; // requerido

    $Apellidos = $_POST['apellidos']; // requerido

    $RazonSocial = $_POST['razon']; // requerido

    $Correo = $_POST['email']; // requerido

    $Telefono = $_POST['telefono']; // no requerido

    $Celular = $_POST['celular']; // no requerido

    $Asunto = $_POST['asunto'];

    $Texto = $_POST['mensaje']; // requerido
 
//Recepcion de datos por medio de AngularJS
   //para bd mysql $data = json_decode(file_get_contents("php://input"), true);


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

?>


$(document).ready(function () {  

	$('#btnAdmin').click(function() {

	var correoAdminLargo = $('.form-control#correoAdmin').val().length;
	var passwordAdminLargo = $('.form-control#passwordAdmin').val().length;


	if( correoAdminLargo <= 5 ){
	alert('Por favor ingrese debidamente su correo electrónico.');
	$('.form-control#correoAdmin').focus();
		return false;
	}else if( passwordAdminLargo == 0 ){
	alert('Por favor ingrese su contraseña.');
	$('.form-control#passwordAdmin').focus();
		return false;
	}else{
		//Obtencion de datos del formulario:
		var correo = $('.form-control#correoAdmin').val();
		var password = $('.form-control#passwordAdmin').val();
		

		//Ejecucion AJAX.
		var dataString = 'correo='+ correo + '&password='+ password;

		$.ajax({
			type:"POST",
			url: "php/loginAdmin.php",
			data: dataString,
			cache: false,
			success: function(result){
				
				if (result == 0){
					window.location = 'plantillas/errorLoginAdmin.html';
				}else if(result == 1){
					window.location = 'admin/loginOro.php';
				}else if(result == 2){
					window.location = 'admin/loginPlata.php';
				}else if(result == 3){
					window.location = 'admin/loginBronce.php';
				}else if(result == 4){
					window.location = 'admin/loginAdmin.php';
				}
			}
		});
	}

	return false;

	});

});
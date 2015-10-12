$(document).ready(function () {  

	$('#btnContacto').click(function() {

	var nombresLargo = $('.form-control#nombres_txt').val().length;
	var apellidosLargo = $('.form-control#apellidos_txt').val().length;
	var razonLargo = $('.form-control#razon_txt').val().length;
	var emailLargo = $('.form-control#email_txt').val().length;
	var asuntoLargo = $('.form-control#asunto_txt').val().length;
	var mensajeLargo = $('.formulario-area#mensaje_txt').val().length;
	var telefonoLargo = $('.form-control#telefono_txt').val().length;
	var celularLargo = $('.form-control#celular_txt').val().length;

	if( nombresLargo <= 2 ){
	alert('Por favor complete el formulario nombres.');
	$('.form-control#nombres_txt').focus();
		return false;
	}else if( nombresLargo >= 30 ){
	alert('El campo nombres excede el valor permitido.');
	$('.form-control#nombres_txt').focus();
		return false;
	}else if( apellidosLargo <= 2 ){
	alert('Por favor complete el formulario apellidos');
	$('.form-control#apellidos_txt').focus();
		return false;
	}else if( apellidosLargo >= 30 ){
	alert('El campo apellidos excede el valor permitido.');
	$('.form-control#apellidos_txt').focus();
		return false;
	}else if( razonLargo <= 2 ){
	alert('Por favor complete el formulario razon');
	$('.form-control#razon_txt').focus();
		return false;
	}else if( razonLargo >= 30 ){
	alert('El campo razon excede el valor permitido.');
	$('.form-control#razon_txt').focus();
		return false;
	}else if( emailLargo <= 6 ){
	alert('Por favor complete el formulario Email correctamente');
	$('.form-control#email_txt').focus();
		return false;
	}else if( emailLargo >= 50 ){
	alert('El campo correo electrónico excede el valor permitido.');
	$('.form-control#email_txt').focus();
		return false;
	}else if( telefonoLargo >= 15 ){
	alert('El campo teléfono excede el valor permitido.');
	$('.form-control#telefono_txt').focus();
		return false;
	}else if( celularLargo >= 15){
	alert('El campo celular excede el valor permitido.');
	$('.form-control#celular_txt').focus();
		return false;
	}else if( asuntoLargo <= 2 ){
	alert('Por favor complete el formulario asunto');
	$('.form-control#asunto_txt').focus();
		return false;
	}else if( asuntoLargo >= 30 ){
	alert('El campo asunto excede el valor permitido.');
	$('.form-control#asunto_txt').focus();
		return false;
	}else if( mensajeLargo <= 2 ){
	alert('Por favor complete el formulario mensaje');
	$('formulario-area#mensaje_txt').focus();
		return false;
	}else if( mensajeLargo >= 350 ){
	alert('El campo mensaje excede el valor permitido.');
	$('formulario-area#mensaje_txt').focus();
		return false;	
	}else{
		//Obtencion de datos del formulario:
		var nombres = $('.form-control#nombres_txt').val();
		var apellidos = $('.form-control#apellidos_txt').val();
		var razon = $('.form-control#razon_txt').val();
		var email = $('.form-control#email_txt').val();
		var asunto = $('.form-control#asunto_txt').val();
		var mensaje = $('.formulario-area#mensaje_txt').val();
		var telefono = $('.form-control#telefono_txt').val();
		var celular = $('.form-control#celular_txt').val();

		//Ejecucion AJAX.
		var dataString = 'nombres='+ nombres + '&apellidos='+ apellidos + '&razon='+ razon + '&email='+ email + '&asunto='+ asunto + '&mensaje='+ mensaje + '&telefono='+ telefono + '&celular='+ celular;

		$.ajax({
			type:"POST",
			url: "php/contacto.php",
			data: dataString,
			cache: false,
			success: function(result){
				window.location = 'contactoEnviado.html';
			}
		});
	}

	return false;

	});

});

/*=============================================
BORRAR ALERTAS
=============================================*/

$("input[name='registroEmail'], #politicas").change(function(){

	$(".alert").remove();

})

/*=============================================
VALIDAR EMAIL REPETIDO
=============================================*/

var ruta = $("#ruta").val();

$("input[name='registroEmail']").change(function(){

	$(".alert").remove();

	var email = $(this).val();
	
	var datos = new FormData();
	datos.append("validarEmail", email);

	$.ajax({

		url: ruta+"backoffice/ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){


			if(respuesta){

				$("input[name='registroEmail']").val("");

				$("input[name='registroEmail']").after(`

						<div class="alert alert-warning">
							<strong>ERROR:</strong>
							El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente

						</div>
				`)

				return;

			}

		}

	})

})

/*=============================================
Validar políticas
=============================================*/

function validarPoliticas(){

	var politicas = $("#politicas:checked").val();

	if(politicas != "on"){

		$("#politicas").before(`

				<div class="alert alert-danger">
					<strong>ERROR:</strong>
					Debe aceptar los términos y condiciones
				</div>

			`);

		return false;
	}

	return true;

}
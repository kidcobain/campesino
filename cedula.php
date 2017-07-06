<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>prueba busqueda cedula</title>
	<link rel="stylesheet" href="">
	<script src="jquery-2.1.4.js" type="text/javascript"></script> 
</head>
<body>
	<label for="cedula">cedula</label>
	<input type="text" name="cedula" value="" class="cedula"/>

	<label for="nombre">nombre</label>
	<input type="text" name="nombre" value="" class="nombre"/>

	<label for="apellido">apellido</label>
	<input type="text" name="apellido" value="" class="apellido"/>

	<label for="cooperativa">cooperativa</label>
	<input class="cooperativa" name="cooperativa"></input>

	<label for="telefono">telefono</label>
	<input class="telefono" name="telefono"></input>

	<label for="fundo">fundo</label>
	<input class="fundo" name="fundo"></input>

	<label for="municipio">municipio</label>
	<input class="municipio" name="municipio"></input>

	<label for="parroquia">parroquia</label>
	<input class="parroquia" name="parroquia"></input>

	<label for="sector">sector</label>
	<input class="sector" name="sector"></input>

	<label for="superficie">superficie</label>
	<input class="superficie" name="superficie"></input>

	<label for="solicitud">solicitud</label>
	<input class="solicitud" name="solicitud"></input>

	<label for="planteamiento">planteamiento</label>
	<input class="planteamiento" name="planteamiento"></input>

	<label for="observaciones">observaciones</label>
	<input class="observaciones" name="observaciones"></input>


</body>

<script>
	$(document).ready(function($) {
		$('.cedula').blur(function(event) {
			cedula = $('.cedula').val();
			console.log(cedula);
			$.ajax({
				url: 'buscarcedula.php',
				type: 'POST',
				dataType: 'JSON',
				data: {cedula: cedula},
			})
			.done(function(data) {
				//console.log("success" + data);
				$('.nombre').val(data.primer_nombre);
				$('.apellido').val(data.primer_apellido);
				console.log(data.cedula);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});
	});
</script>
</html>
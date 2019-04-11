<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Consulta DNI</title>
	<link rel="stylesheet" href="estilos.css">
	<script src="jquery.min.js"></script>
</head>
<body>
	<div class="contenedor1">
		<div class="contenedor2">
			<h1>IESTP "DIVINO JESÚS"</h1>
			<h2>SERVICIO DE CONSULTA DE DNI</h2>
			<br>
			<form method="post">
				<input id="dni" name="dni" class="dni" type="text">
				<button id="btn_consultar">Consultar</button>
				<img src="ajax.gif" class="carga hide">
			</form>
		</div><br>
		<div class="contenedor3">
			<table>
				<tr>
					<td><h3>DNI:</h3></td>
					<td><span id="dni_r"></span></td>
				</tr>
				<tr>
					<td><h3>NOMBRES:</h3></td>
					<td><span id="nombres"></span></td>
				</tr>
				<tr>
					<td><h3>APELLIDO PATERNO:</h3></td>
					<td><span id="apellido_paterno"></span></td>
				</tr>
				<tr>
					<td><h3>APELLIDO MATERNO:</h3></td>
					<td><span id="apellido_materno"></span></td>
				</tr>
			</table>
		</div>
	</div>
	<script>
		$(function(){
			$('#btn_consultar').on('click', function(){
				$(".carga").removeClass('hide');
				var dni = $("#dni").val();
				var url = "consulta-reniec.php";
				$.ajax({
					type:'POST',
					url:url,
					data:{dni:dni},
					dataType:"json",
					success: function(data_dni){
						$(".carga").addClass('hide');
						var datos = eval(data_dni);
						$("#dni_r").text(datos.dni);
						$("#nombres").text(datos.nombres);
						$("#apellido_paterno").text(datos.apellido_paterno);
						$("#apellido_materno").text(datos.apellido_materno);
						
					}
				});
				return false;
			});
		});
	</script>
</body>
</html>
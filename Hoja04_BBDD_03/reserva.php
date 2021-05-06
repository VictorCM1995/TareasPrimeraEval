<?php
	require_once("conexionBD.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Reserva</title>
</head>
<body>
	<h1>Reserva de asiento</h1>
	<form method="POST">
		<label>Nombre:</label>
		<input type="text" name="nombre" placeholder="Su nombre"><br>
		<label>DNI:</label>
		<input type="text" name="dni" placeholder="Su DNI"><br>
		<label>Asiento:</label>
		<select name="reserva">
			<?php
				$reservas = mostrarAsientosNoReservados1();
			?>
		</select><br>
		<input type="Submit" name="enviar" value="Reservar">
		<?php
			if(isset($_POST["enviar"])){
				$nombre = $_POST["nombre"];
				$dni = $_POST["dni"];
				$reserva = $_POST["reserva"];
				darReserva1($nombre,$dni,$reserva);
				mas1Reservas1($reserva);
				echo "Se ha reservado el asiento ".$reserva;
			}
		?>
		<a href="principal.php">Volver</a>
	</form>
</body>
</html>
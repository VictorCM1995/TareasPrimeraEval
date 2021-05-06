<?php
	require_once("conexionBD.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Llegada</title>
</head>
<body>
	<h1>Llegada</h1>
	<input type="Submit" name="enviar" value="Llegada"><br>
	<?php
		ceroReservas1();
		borrarPasajeros1();
	?>
	<a href="principal.php">Volver</a>
</body>
</html>
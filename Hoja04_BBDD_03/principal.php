<?php
	require_once("conexionBD.php");
	session_start();
	$_SESSION["nombre"] = "Pepe";
	session_destroy();
	if(isset($_SESSION["nombre"])){
		echo "<p>El usuario es ".$_SESSION['nombre']."</p>";
	} else {
		echo "<p>No se su nombre.</p>";
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Principal</title>
</head>
<body>
	<h1>Gestion del funicular</h1>
	<p>Elige una opcion</p>
	<a href="reserva.php">Realizar una reserva</a><br>
	<a href="llegada.php">Llegada</a><br>
	<a href="Cambios.php">Reservas</a><br>
	<a href="usuario.php">USUARIOS</a><br>
</body>
</html>
<?php
	require_once("conexionBD.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>BBDD</title>
</head>
<body>
<form method="post">
<select name="ne">
<?php
	$equipos = getEquipos1();
	foreach($equipos as $equipo){
		echo "<option>".$equipo["nombre"]."</option>";
	}
?>
</select>
<input type="submit" name="enviar" value="Mostrar">
<?php
	if(isset($_POST['enviar'])){
		$ne = $_POST["ne"];
		$jugadores = getJugadores1A($ne);
		echo "<table border=1>";
		echo "<tr><th>NOMBRE</th></tr>";
		foreach($jugadores as $jugador){
			echo "<tr><td>".$jugador["nombre"]."</td></tr>";
		}
		echo "</table>";
	}
?>
</form>
</body>
</html>
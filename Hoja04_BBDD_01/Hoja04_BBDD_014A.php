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
	<?php
		$equipos = getEquipos1();
		echo "<table border=1>";
		echo "<tr><td>NOMBRE</td></tr>";
		foreach($equipos as $equipo){
			echo "<tr><td>".$equipo["nombre"]."</td></tr>";
		}
	?>
</body>
</html>
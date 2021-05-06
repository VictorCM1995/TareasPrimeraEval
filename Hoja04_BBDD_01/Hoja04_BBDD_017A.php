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
<input type="submit" name="enviar" value="Mostrar"><br>
<label>Baja de jugador: </label>
</form>
<form method="post"><select name="sds">
<?php
	if(isset($_POST['enviar'])){
		$ne = $_POST["ne"];
		$jugadores = getJugadores1A($ne);
		foreach($jugadores as $jugador){
			echo "<option>".$jugador["nombre"]."</option>";
		}
	}
?>
</select>
	<p>Datos del nuevo jugador</p>
	<label>Nombre:</label>
	<input type="text" name="nombre"><br>
	<label>Procedencia:</label>
	<input type="text" name="procedencia"><br>
	<label>Altura:</label>
	<input type="number" name="altura" step="0.01" value="0,00"><br>
	<label>Peso:</label>
	<input type="number" name="peso" step="0.01" value="0,00"><br>
	<label>Posicion:</label>
	<select name="posicion">
		<?php
			$posiciones = getPosicion1();
			foreach($posiciones as $posicion){
				echo "<option>".$posicion["posicion"]."</option>";
			}
		?>
	</select><input type="submit" name="mod" value="Realizar traspaso">
	<?php
		if(isset($_POST["mod"])){
			$nombreViejo = $_POST["sds"];
			$nombre = $_POST["nombre"];
			$procedencia = $_POST["procedencia"];
			$altura = $_POST["altura"];
			$peso = $_POST["peso"];
			$posicion = $_POST["posicion"];
			insert1($nombreViejo,$nombre,$procedencia,$altura,$peso,$posicion);
		}
	?>
	
</form>
</body>
</html>
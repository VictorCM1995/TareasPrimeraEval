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
	<form action="" method="POST">
		<h1>Gestion de plazas</h1>
		<?php
			todoP2();
		?>
		<br><label>¿Que plaza desea modificar?</label>
		<select name="plaza">
			<?php
				 mostrarAsientosNoReservados2();
			?>
		</select><br>
		<label>¿Que nueva cantidad va ha poner?</label><input type="number" step="0.01" name="precio"><br>
		<a href="principal.php">Volver</a>
		<input type="Submit" name="enviar" value="Actualizar">
		<?php
			if(isset($_POST["enviar"])){
				$np = $_POST["plaza"];
				$p = $_POST["precio"];
				actualizar2($p,$np);
				echo "Se han actualizado los precios.";
			}
		?>
	</form>
</body>
</html>
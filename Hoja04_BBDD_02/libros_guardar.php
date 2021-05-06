<?php
	require_once("conexionBD.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>LIBROS GUARDAR</title>
</head>
<body>
	<?php
		if(isset($_POST["enviar"])){
			$titulo = $_POST["titulo"];
			$año = $_POST["año"];
			$precio = $_POST["precio"];
			$fecha = $_POST["fecha"];
			insertar($titulo,$año,$precio,$fecha);
		}
	?>
	<a href="libros.php">Volver</a>
</body>
</html>
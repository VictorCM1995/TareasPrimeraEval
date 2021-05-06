<?php
	require_once("conexionBD.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>LIBROS</title>
</head>
<body>
	<h1>INSERTE LOS DATOS DEL LIBRO</h1>
	<form action="libros_guardar.php" method="POST">
		<label>Titulo</label>
		<input type="text" name="titulo"><br>
		<label>Año de edicion</label>
		<input type="number" name="año" min="1000"><br>
		<label>Precio</label>
		<input type="number" name="precio" step="0.01"><br>
		<label>Fecha adquision</label>
		<input type="date" name="fecha"><br>
		<input type="Submit" name="enviar" value="Guardar datos del libro">
		<a href="libros_datos.php">Mostrar los libros guardados</a>
	</form>
</body>
</html>
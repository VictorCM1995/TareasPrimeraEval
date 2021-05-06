<?php
	require_once("conexionBD.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>LIBROS DATOS</title>
</head>
<body>
	<table border="1" style="text-align:center">
		<tr>
			<th>NÚMERO DE EJEMPLAR</th>
			<th>TITULO</th>
			<th>AÑO DE EDICIÓN</th>
			<th>PRECIO</th>
			<th>FECHA DE ADQUISICIÓN</th>
		</tr>
	<?php
		$libros = mostrar();
	?>
</table>
<a href="libros.php">Volver</a>
</body>
</html>
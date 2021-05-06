<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>LOG</title>
</head>
<body>
	<?php
		if(isset($_SESSION["nombre"])){
			echo "<p>Has iniciado sesion como: ".$_SESSION["nombre"]."</p>";
			echo "<p><a href='3.php'>Cerrar Sesion</a></p>";
			echo "<br><p><a href='2.php'>Ir al panel de control</a></p>";
		} else {
	?>
	<h2>Creando la sesion</h2>
	<form action="2.php" method="POST">
		<p>Nombres:</p>
		<p><input type="text" placeholder="Ingrese su Nombre" name="nombre" required /></p>
		<p><input type="password" name="pd" /></p>
		<p><input type="Submit" value="Crear Sesion" /></p>
			</form>
	<?php
		}
	?>
</body>
</html>
<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>PC</title>
</head>
<body>
	<h2>La sesion creada correctamente</h2>
	<p>
		<?php
			if(isset($_POST["nombre"])){
				$_SESSION["nombre"] = $_POST["nombre"];
				echo "Bienvenido! Has iniciado sesion como:<b> ".$_POST["nombre"]."</b>";
			}else{
				if(isset($_SESSION["nombre"])){
					echo "Has iniciado Sesion como".$_SESSION["nombre"];
				}else{
					echo "Acceso Restringido";
				}
			}
		?>
	</p><br>
	<p><a href="1.php">Ir a la pagina Inicial</a></p><br>
	<p><a href='3.php'>Cerrar Sesion</a></p>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP</title>
</head>
<body>
	<form method="POST">
		<label>Introduce nombre de pelicula</label>
		<input type="search" name="pelicula"><br>
	<?php
		$peliculas = array(
				"UP","It","Annabelle","El Grito","El duque",
				"Donny","El resplandor","El cometa","Herpes","J");
		$texto = empty($_POST["pelicula"])?'Introduzca nombre de pelicula':$_POST["pelicula"];
		$respuesta = false;
		for($i=0;$i<count($peliculas);$i++){
			if($texto == $peliculas[$i]){
				$respuesta = true;
			}
		}
		if($respuesta){
			echo "La pelicula ".$texto." esta en la lista";
		}else{
			echo "La pelicula ".$texto." NO esta en la lista";
		}
	?>
	</form>
</body>
</html>
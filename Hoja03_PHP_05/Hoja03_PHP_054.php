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
		<label>Buscador de peliculas</label>
		<input type="search" name="pelicula"><br>
	<?php
		$peliculas = array(
				"UP","Annabelle","El Grito","El resplandor");
		$fotos = array(
			"https://pics.filmaffinity.com/Up-672315222-mmed.jpg",
			"https://www.ecestaticos.com/image/clipping/093c47ea0393e11f996496a80b7bb352/resuelto-el-misterio-de-la-muneca-annabelle-desaparecio-realmente-del-museo-warren.jpg",
			"https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/The_Scream_by_Edvard_Munch%2C_1893_-_Nasjonalgalleriet.png/1200px-The_Scream_by_Edvard_Munch%2C_1893_-_Nasjonalgalleriet.png",
			"https://i.pinimg.com/736x/87/1b/7e/871b7e1ea20c48ebc9d9c11830e266ee.jpg");
		$texto = empty($_POST["pelicula"])?'Introduzca nombre de pelicula': $_POST["pelicula"];
		$respuesta = false;
		for($i=0;$i<count($peliculas);$i++){
			if($texto == $peliculas[$i]){
				$respuesta = true;
				$indice = $i;
			}
		}
		if($respuesta){
			echo "La pelicula ".$texto." esta en la lista<br>";
			echo "<img src='".$fotos[$indice]."' width='75' height='100'>";
		}else{
			echo "La pelicula ".$texto." NO esta en la lista";
		}
	?>
	</form>
</body>
</html>
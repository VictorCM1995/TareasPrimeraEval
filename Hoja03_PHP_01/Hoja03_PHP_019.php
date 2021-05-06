<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP</title>
</head>
<body>
<?php
	$distancia = 1000;
	$dias = 8;
	$numero = 2.5;
	$precio = $distancia * $numero; 
	if($dias > 7 && $distancia > 800){
		$precio = $precio - (($precio * 30) / 100);
	}
	echo "Precio billete: ".$precio;
?>
</body>
</html>
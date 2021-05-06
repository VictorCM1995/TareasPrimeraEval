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
	$operador1 = 13;
	$operador2 = 4;
	$resultado = $operador1 - $operador2;
	echo $operador1." - ".$operador2." = ".$resultado."<br>";
	$resultado = $operador1 + $operador2;
	echo $operador1." + ".$operador2." = ".$resultado."<br>";
	$resultado = $operador1 * $operador2;
	echo $operador1." x ".$operador2." = ".$resultado."<br>";
	$resultado = $operador1 / $operador2;
	echo $operador1." / ".$operador2." = ".$resultado."<br>";
	$resultado = $operador1 % $operador2;
	echo $operador1." % ".$operador2." = ".$resultado."<br>";
?>
</body>
</html>
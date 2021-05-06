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
	$dinero = ["billetes"=>[500, 250, 100, 50, 20, 10, 5],"monedas"=>[2, 1, 0.5, 0.2, 0.1, 0.05, 0.02, 0.01]];
	$cantidad = 222;
	foreach ($dinero as $medio => $valores) {
		foreach ($valores as $valor) {
			if($cantidad >= $valor){
				echo $medio." con valor de \$$valor: ".floor($cantidad/$valor)."<br>";
				$cantidad = $cantidad % $valor;
				if(!$cantidad)
					break 2;
			}
		}
	}
?>
</body>
</html>
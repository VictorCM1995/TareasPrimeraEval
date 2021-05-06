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
	function mayor($array){
		echo "El mayor es ".max($array["Existencias"])."<br>";
	}

	function sumar($array){
		$suma = 0;
		foreach($array["Existencias"] as $v){
			$suma = $suma + $v;
		}
		echo "La suma es ".$suma."<br>";
	}  

	function mostrar($array){
		$contador = 1;
		foreach($array as list($a,$b,$c)){
			echo "Articulo ".$contador.": ".$a.", ".$b.", ".$c."<br>";
			$contador++;
		}
	}

	$articulo = array(
		"Codigo"=>array(1,2,3),
		"Descripcion"=>array("A","B","C"),
		"Existencias"=>array(111,22,3)
	);
	mayor($articulo);
	sumar($articulo);
	mostrar($articulo);
?>
</body>
</html>
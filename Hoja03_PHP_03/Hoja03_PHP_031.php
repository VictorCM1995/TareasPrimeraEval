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
	function cargar($tamaño){
		for($i=0;$i<$tamaño;$i++){
			$numeros[] = rand(0,$tamaño);
		}
		return $numeros;
	}

	function mostrar($array){
		foreach($array as $v){
			echo $v."<br>";
		}
	}

	function fusionar($array1,$array2){
		foreach($array2 as $a){
			$array1[] = $a;
		}
		return $array1;
	}

	function ordenar($array){
		for($i=1;$i<count($array);$i++){
			for($j=0;$j<count($array)-$i;$j++){
				if($array[$j]>$array[$j+1]){
					$k = $array[$j+1];
					$array[$j+1] = $array[$j];
					$array[$j] = $k;
				}
			}
		}
		return $array;
	}
	$a = cargar(3);
	$b = cargar(3);
	mostrar($a);
	echo "<br>";
	mostrar($b);
	echo "<br>";
	mostrar(fusionar($a,$b))."<br>";
	echo "<br>";
	mostrar(ordenar($a))."<br>";
?>
</body>
</html>
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
	for($i=0;$i<=999;$i++){
		$unidad = (int)($i % 10);
		$aux = (int)($i % 100);
		$decena = (int)($aux / 10);
		$centena = (int)($i / 100);
		$suma = $unidad + $decena + $centena;
		$prod = $unidad * $decena * $centena;
		if($suma == $prod){
			echo $i."<br>";
		}
	}
?>
</body>
</html>
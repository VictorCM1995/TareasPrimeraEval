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
	$numero = 12321;
	$ninv = 0;
	$cociente = $numero;
	while($cociente != 0){
		$resto = $cociente % 10;
		$ninv = $ninv * 10 + $resto;
		$cociente = (int)($cociente /10);
	}
	if($numero == $ninv){
		echo "El numero ".$numero." es capicua";
	}else{
		echo "El numero ".$numero." NO es capicua";
	}
?>
</body>
</html>
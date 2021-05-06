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
	$valor = 12;
	$primo = 0;
	for($i = 1;$i < $valor; $i++){
		if($valor % $i==0){
			$primo++;
		}
	}
	if($primo >= 2){
		echo "NO es primo";
	} else {
		echo "SI es primo";
	}
?>
</body>
</html>
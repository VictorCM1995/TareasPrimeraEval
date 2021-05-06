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
	$a = 11;
	$b = 22;
	echo $a ." y ".$b."<br>";
	$aux = $a;
	$a = $b;
	$b = $aux;
	echo $a ." y ".$b;
?>
</body>
</html>
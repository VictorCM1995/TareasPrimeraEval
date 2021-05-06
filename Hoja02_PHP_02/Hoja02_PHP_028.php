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
	$euros = 322;
	$diez = $euros / 10;
	$cinco = $euros / 5;
	$uno = $euros / 1;
	echo "Billetes de 10: ".(int)$diez."<br>";
	echo "Monedas de 5: ".(int)$cinco."<br>";
	echo "Monedas de 1: ".(int)$uno."<br>";
?>
</body>
</html>
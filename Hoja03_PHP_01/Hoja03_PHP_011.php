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
	setLocale(LC_ALL, "spanish");
	$diam = date("j");
	$anno = date("Y");
	echo "La fecha de hoy es ".strftime("%A")." ".$diam." de ".strftime("%B")." del ".$anno;
?>
</body>
</html>
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
	$numero = 6;
	$x = 1;
	for($i=0;$i<=$numero-1;$i++){
		$x*= ($i + 1);
	}
	echo "El factorial de ".$numero." es ". $x;
?>
</body>
</html>
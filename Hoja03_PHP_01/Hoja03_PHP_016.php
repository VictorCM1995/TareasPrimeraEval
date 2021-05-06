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
	$n1 = 1;
	$n2 = 0;
	for($i = 0;$i<8;$i++){
		$suma = $n1 +$n2;
		$n1 = $n2;
		$n2 = $suma;
		echo $suma.", ";
	}
?>
</body>
</html>
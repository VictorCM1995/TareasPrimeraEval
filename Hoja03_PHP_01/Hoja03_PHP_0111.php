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
	for($i = 10; $i > 0; $i--){
		for($j = $i; $j > 0; $j--){
			echo $j." ";
		}
		echo "<br>";
	}
?>
</body>
</html>
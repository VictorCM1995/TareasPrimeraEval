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
	$a = 1;
	$b = 2;
	for($i=0;$i<=10;$i++){
		echo $a."/".$b."<br>";
		$a+=1;
		$b*=2;
	}
?>
</body>
</html>
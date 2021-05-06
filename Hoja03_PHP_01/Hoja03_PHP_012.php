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
	$total = 0;
	for($i=10;$i<=100;$i++){
		if($i%2==0){
			$total += $i;
		}
	}
	echo $total;
?>
</body>
</html>
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
	for($i = 3; $i<= 999;$i++){
		$primo = 0;
		for($j = 1;$j < $i; $j++){
			if($i % $j==0){
				$primo++;
			}
		}
		if(!($primo >= 2)){
			echo $j."<br>";
		}
	}
?>
</body>
</html>
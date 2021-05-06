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
	function mostrar($array){
		foreach($array as $dato => $info){
			echo "<table border='1'>";
			echo "<tr>";
			echo "<td>".$info."</td>";
			echo "<td>".$dato."</td>";
			echo "</tr>";
			echo "</table>";
		}
	}
	mostrar($_SERVER);
?>
</body>
</html>
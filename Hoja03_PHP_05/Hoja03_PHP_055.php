<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP</title>
</head>
<body>
	<form method="POST">
		<p>Suma de cantidades</p>
	<?php
		$numero = array();
		for($i=0;$i<10;$i++){
			echo "<label>Cantidad ".($i+1).":     </label>";
			echo "<input type='number' name='n".($i+1)."' value='".($i+1)."'><br><br>";
			array_push($numero, ($i+1));
		}
	?>
	<input type="submit" name="enviar" value="Sumar"><br>
	<?php 
		if(isset($_POST["enviar"])){
			$suma = 0;
			for($i=0;$i<count($numero);$i++){
				$suma += ($i+1);
			}
			echo "La suma es ".$suma;
		}
	?>
	</form>
</body>
</html>
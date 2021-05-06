<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP</title>
</head>
<body>
	<p>Conversor de monedas</p>
	<form method="POST">
	<label>Cantidad</label>
	<input type="number" name="numero" 
	value="<?php echo isset($_POST['numero']) ? $_POST['numero']: '' ?>"><br>
	<label>Origen</label>
	<select name="o">
		<option value="Libras"<?php if(isset($_POST['o']) && $_POST['o']=="Libras")echo "selected = 'selected'";?>>Libras</option>
		<option value="Euros"<?php if(isset($_POST['o']) && $_POST['o']=="Euros")echo "selected = 'selected'";?>>Euros</option>
		<option value="Dolares"<?php if(isset($_POST['o']) && $_POST['o']=="Dolares")echo "selected = 'selected'";?>>Dolares</option>
	</select><br>
	<label>Destino</label>
	<select name="d">
		<option value="Libras"<?php if(isset($_POST['d']) && $_POST['d']=="Libras")echo "selected = 'selected'";?>>Libras</option>
		<option value="Euros"<?php if(isset($_POST['d']) && $_POST['d']=="Euros")echo "selected = 'selected'";?>>Euros</option>
		<option value="Dolares"<?php if(isset($_POST['d']) && $_POST['d']=="Dolares")echo "selected = 'selected'";?>>Dolares</option>
	</select><br>
	<input type="submit" name="enviar" value="Convertir"><br>
	<?php

		if(isset($_POST["enviar"])){
			$numero = $_POST["numero"];
			$origen = $_POST["o"];
			$destino = $_POST["d"];
			$resultado = 0;
			if($origen == "Libras" && $destino == "Euros"){
				$resultado = $numero * 1.16;
			} else if($origen == "Libras" && $destino == "Dolares"){
				$resultado = $numero * 1.37;
			} else if($origen == "Euros" && $destino == "Libras"){
				$resultado = $numero * 0.86;
			} else if($origen == "Euros" && $destino == "Dolares"){
				$resultado = $numero * 1.18;
			} else if($origen == "Dolares" && $destino == "Libras"){
				$resultado = $numero * 0.73;
			} else if($origen == "Dolares" && $destino == "Euros"){
				$resultado = $numero * 0.85;
			} else if($origen == $destino){
				$resultado = $numero;
			}
			echo $numero." ".$origen." son ".$resultado." ".$destino;
		}	
	?>
	</form>
</body>
</html>
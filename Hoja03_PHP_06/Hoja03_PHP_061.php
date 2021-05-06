<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>PHP</title>
</head>
<body>
	<form method="post">
		<p>Busca tu coche</p>
		<?php
			$coches = array(
				"A" => array("1A","2A","3A"),
				"B" => array("1B","2B","3B"),
				"C" => array("1C","2C","3C")
			);
		?>
		<label>Marca: </label>
		<select name="marca">
		<?php
			foreach($coches as $coche => $id){
				echo "<option value='$coche' name='$coche'>".$coche."</option>";
			}
		?>
		</select>
		<input type="submit" name="enviar" value="Buscar"><br><br>
	</form>
	<form method="post">
		<?php
			if(isset($_POST["enviar"])){
				$valor = $_POST["marca"];
				echo "<table border='1'>";
				echo "<tr>";
				echo "<td>Coche</td>";
				echo "</tr>";
				$info = array();
				foreach($coches as $key => $coche){
					if($key==$valor){
						foreach($coche as $indice => $v){
							echo "<tr><td><input type='text' name='info[]' value='".$v."'></td></tr>";
						}
					}
				}
				echo "</table><br>";
			}

		?>
		<input type="submit" name="act" value="Actualizar"><br><br>
		<?php
			if(isset($_POST["act"])){
				echo print_r($info);
			}

		?>
	</form>
</body>
</html>
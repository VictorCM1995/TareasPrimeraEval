<html>
	<head>
		<meta charset="UTF-8">
		<title>Ejercicio 2</title>
	</head>
	<body>
		<h1>Elige un equipo</h1>
		<?php
			$futbol = array(
				"Real Madrid" => array(
										"Entrenador" => "Zidane", 
										"jugadores" => array(
																"Courtois","Ramos","Hazard"
															)
									),
				"Barcelona" => array(
										"Entrenador" => "Koeman", 
										"jugadores" => array(
																"Ter Stegen","Pique","Griezmann"
															)
									)
			);
		?>
		<form method="post">
			<label>Equipo</label>
			<select name="equipos">
				<option value="Todos">--Todos--</option>
				<option value="Barcelona">Barcelona</option>
				<option value="Real Madrid">Real Madrid</option>
			</select><br>
			<label>Puesto</label>
			<input type="radio" id="t" name="tj" value="Entrenador" checked>
			<label for="t">entrenador</label>
			<input type="radio" id="j" name="tj" value="jugadores">
			<label for="j">jugadores</label><br>
			<input type="submit" name="buscar" value="Buscar">
			<?php
				$entrenador1 = $futbol["Real Madrid"]["Entrenador"];
				$entrenador2 = $futbol["Barcelona"]["Entrenador"];
				$equipo1 = $futbol["Real Madrid"]["jugadores"];
				$equipo2 = $futbol["Barcelona"]["jugadores"];
				if(isset($_POST['buscar'])){
					$equipos = $_POST['equipos'];
					$puesto = $_POST['tj'];
					if($equipos == "Todos" && $puesto == "Entrenador"){
						echo "<table border=1>";
						echo "<tr>";
						foreach($futbol as $dato=>$key){
							echo "<th>$dato</th>";
						}
						echo "</tr>";
						echo "<tr>";
						foreach($futbol as $dato){
							foreach($dato as $en=>$d){
								if($en=="Entrenador"){
									echo "<td>$d<br><img src='".$d.".jpg' width='100' height='100'></td>";
								}
							}
						}
						echo "</tr>";
						echo "</table>";
					} else if($equipos == "Todos" && $puesto == "jugadores"){
						echo "<table border=1>";
						echo "<tr>";
						foreach($futbol as $dato=>$key){
							echo "<th>$dato</th>";
						}
						echo "</tr>";
						for($i=0;$i<count($equipo1);$i++){
							echo "<tr><td>".$equipo1[$i]."<br><img src='".$equipo1[$i].".jpg' width='100' height='100'></td><td>".$equipo2[$i]."<br><img src='".$equipo2[$i].".jpg' width='100' height='100'></td></tr>";
						}
						echo "</table>";
					} else if($equipos == "Barcelona" && $puesto == "Entrenador"){
						echo "<table border=1>";
						echo "<tr>";
						foreach($futbol as $dato=>$key){
							if($dato=="Barcelona"){
								echo "<th>$dato</th>";
							}
						}
						echo "</tr>";
						echo "<tr><td>$entrenador2<br><img src='".$entrenador2.".jpg' width='100' height='100'></td></tr>";
						echo "</table>";
					} else if($equipos == "Barcelona" && $puesto == "jugadores"){
						echo "<table border=1>";
						echo "<tr>";
						foreach($futbol as $dato=>$key){
							if($dato=="Barcelona"){
								echo "<th>$dato</th>";
							}
						}
						echo "</tr>";
						for($i=0;$i<count($equipo2);$i++){
							echo "<tr><td>".$equipo2[$i]."<br><img src='".$equipo2[$i].".jpg' width='100' height='100'></td></tr>";
						}
						echo "</table>";
					} else if($equipos == "Real Madrid" && $puesto == "Entrenador"){
						echo "<table border=1>";
						echo "<tr>";
						foreach($futbol as $dato=>$key){
							if($dato=="Real Madrid"){
								echo "<th>$dato</th>";
							}
						}
						echo "</tr>";
						echo "<tr><td>$entrenador1<br><img src='".$entrenador1.".jpg' width='100' height='100'></td></tr>";
						echo "</table>";
					} else if($equipos == "Real Madrid" && $puesto == "jugadores"){
						echo "<table border=1>";
						echo "<tr>";
						foreach($futbol as $dato=>$key){
							if($dato=="Real Madrid"){
								echo "<th>$dato</th>";
							}
						}
						echo "</tr>";
						for($i=0;$i<count($equipo1);$i++){
							echo "<tr><td>".$equipo1[$i]."<br><img src='".$equipo1[$i].".jpg' width='100' height='100'></td></tr>";
						}
						echo "</table>";
					}
				}
			?>
		</form>
	</body>
</html>
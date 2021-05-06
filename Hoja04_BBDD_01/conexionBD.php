<?php
function getConexion1(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "nba";
	$conn = new mysqli($servername, $username, $password, $db);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}
function getConexion2(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "nba";
	try {
		$conn = new PDO("mysql:host=$servername;dbname=".$db, $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully 2<br>";
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	return $conn;
}

function getEquipos1(){
	$conexion = getConexion1();
	$sql = "SELECT nombre FROM equipos";
    $result = $conexion->query($sql);
    $conexion->close();
	return $result;
}

function getJugadores1A($equipo){
	$conexion = getConexion1();
	$sql = "SELECT nombre FROM jugadores where nombre_equipo='$equipo'";
    $result = $conexion->query($sql);
    $conexion->close();
	return $result;
}

function getJugadores1B($equipo){
	$conexion = getConexion1();
	$sql = "SELECT nombre,peso FROM jugadores where nombre_equipo='$equipo'";
    $result = $conexion->query($sql);
    $conexion->close();
	return $result;
}

function getPosicion1(){
	$conexion = getConexion1();
	$sql = "SELECT distinct posicion FROM jugadores";
    $result = $conexion->query($sql);
    $conexion->close();
	return $result;
}

function selectId1($nombre){
	$conexion = getConexion1();
	$sql = $conexion->stmt_init();
	$sql->prepare("SELECT codigo from jugadores where nombre='$nombre'");
	$sql->execute();
	$sql->bind_result($result);
	$conexion->close();
	return $result;
}

function insert1($nombreviejo,$nombre,$procedencia,$altura,$peso,$posicion){
	$conexion = getConexion1();
	$sql = "UPDATE jugadores set nombre='$nombre',procedencia='$procedencia',altura=$altura,peso=$peso,posicion='$posicion' where nombre=$nombreviejo";
	if($conexion->query($sql)==TRUE){
		echo "New Record";
	} else {
		echo "Error ".$conexion->error;
	}
    $conexion->close();
}

function f1(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT nombre,altura from jugadores where altura=(select min(altura) from jugadores)")){
        $sql->execute();
        $sql->bind_result($nombre,$altura);
        while($sql->fetch()){
            printf("El jugador mas bajo es %s con una altura de %s\n", $nombre,$altura);
        }
        $sql -> close();
        return $sql;
    }
	/*$conexion = getConexion1();
	$sql = "SELECT nombre,altura from jugadores where altura=(select min(altura) from jugadores)";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	while($row = $result->fetch_assoc()){
    		echo "1- El jugador mas bajito es ".$row["nombre"]." con una altura de ".$row["altura"]."<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;*/
}//SI

function f2(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT count(*)as numero from jugadores where nombre_equipo='Lakers' group by(nombre_equipo)")){
        $sql->execute();
        $sql->bind_result($numero);
        while($sql->fetch()){
            printf("El numero total de jugadores de los Lakers es de %s\n", $numero);
        }
        $sql -> close();
        return $sql;
    }/*
	$conexion = getConexion1();
	$sql = "SELECT count(*)as numero from jugadores where nombre_equipo='Lakers' group by(nombre_equipo)";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	while($row = $result->fetch_assoc()){
    		echo "2- Numero total de jugadores de los Lakers es ".$row["numero"]."<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;*/
}//SI

function f3(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT avg(peso) as media from jugadores where nombre_equipo='TRAIL BLAZERS'")){
        $sql->execute();
        $sql->bind_result($media);
        while($sql->fetch()){
            printf("La media de los jugadores de los TRAIL BLAZERS es de %s\n", $media);
        }
        $sql -> close();
        return $sql;
    }
	/*$conexion = getConexion1();
	$sql = "SELECT avg(peso) as media from jugadores where nombre_equipo='TRAIL BLAZERS'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	while($row = $result->fetch_assoc()){
    		echo "3- La media de peso de los jugadores de los TRAIL BLAZERS es ".$row["media"]."<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;*/
}//SI

function f4(){
	$conexion = getConexion1();
	$sql = "SELECT nombre, peso, nombre_equipo from jugadores order by nombre_equipo, peso";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	while($row = $result->fetch_assoc()){
    		echo $row["nombre"]." con peso ".$row["peso"]." del equipo ".$row["nombre_equipo"]."<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;
}//REVISAR

function f5(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare( "SELECT conferencia,count(*) as eq from equipos group by conferencia")){
        $sql->execute();
        $sql->bind_result($conferencia,$eq);
        while($sql->fetch()){
            printf("La conferencia %s tiene %s equipos <br>", $conferencia,$eq);
        }
        $sql -> close();
        return $sql;
    }
	/*$conexion = getConexion1();
	$sql = "SELECT conferencia,count(*) as eq from equipos group by conferencia";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	echo "Ejercicio 5<br>";
    	while($row = $result->fetch_assoc()){	
    		echo "- El numero de equipos de la conferencia ".$row["conferencia"]." es de " .$row['eq']."<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;*/
}//SI

function f6(){
	$conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT avg(peso) as media FROM jugadores where procedencia LIKE 'SPAIN' or procedencia like 'FRANCE' or procedencia LIKE 'ITALY'")){
        $sql->execute();
        $sql->bind_result($media);
        while($sql->fetch()){
            printf("La media de los jugadores de España, Francia e Italia es de %s\n", $media);
        }
        $sql -> close();
        return $sql;
    }
    /*$conexion = getConexion1();
	$sql ="SELECT avg(peso) as media FROM jugadores where procedencia LIKE 'SPAIN' or procedencia like 'FRANCE' or procedencia LIKE 'ITALY'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	while($row = $result->fetch_assoc()){
    		echo "6- La media de los jugadores de España, Francia e Italia es de ".$row['media']."<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;*/
}//SI

function f7(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT nombre,peso FROM jugadores where peso>100 order by peso")){
        $sql->execute();
        $sql->bind_result($nombre,$peso);
        while($sql->fetch()){
            printf("%s pesa %s kg <br>\n", $nombre,$peso);
        }
        $sql -> close();
        return $sql;
    }
	/*$conexion = getConexion1();
	$sql ="SELECT nombre,peso FROM jugadores where peso>100 order by peso";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	echo "Ejercicio 7<br>";
    	while($row = $result->fetch_assoc()){
    		echo "El jugador ".$row["nombre"]." pesa ".$row["peso"]."<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;*/
}//SI

function f8(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT distinct nombre_equipo FROM jugadores where procedencia='Spain'")){
        $sql->execute();
        $sql->bind_result($nombre_equipo);
        while($sql->fetch()){
            printf("- %s tiene jugadores de España <br>\n", $nombre_equipo);
        }
        $sql -> close();
        return $sql;
    }
	/*$conexion = getConexion1();
	$sql ="SELECT distinct nombre_equipo FROM jugadores where procedencia='Spain'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	echo "Ejercicio 8<br>";
    	while($row = $result->fetch_assoc()){
    		echo "-El equipo ".$row["nombre_equipo"]." tiene al menos 1 español<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;*/
}//SI

function f9(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT jugadores.nombre as nom FROM jugadores,equipos where jugadores.nombre_equipo=equipos.nombre and division='SouthWest'")){
        $sql->execute();
        $sql->bind_result($nom);
        while($sql->fetch()){
            printf("- %s es de la division Suroeste <br>\n", $nom);
        }
        $sql -> close();
        return $sql;
    }
	/*$conexion = getConexion1();
	$sql ="SELECT jugadores.nombre as nom FROM jugadores,equipos where jugadores.nombre_equipo=equipos.nombre and division='SouthWest'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	echo "Ejercicio 9<br>";
    	while($row = $result->fetch_assoc()){
    		echo "-El jugador ".$row["nom"]." de la division SouthWest.<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;*/
}//SI

function f10(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT nombre,altura from jugadores where altura=(select max(altura) from jugadores)")){
        $sql->execute();
        $sql->bind_result($nombre,$altura);
        while($sql->fetch()){
            printf("- %s tiene una altura de %s metros <br>\n", $nombre,$altura);
        }
        $sql -> close();
        return $sql;
    }
	/*$conexion = getConexion1();
	$sql = "SELECT nombre,altura from jugadores where altura=(select max(altura) from jugadores)";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	while($row = $result->fetch_assoc()){
    		echo "10- El jugador mas alto es ".$row["nombre"]." con una altura de ".$row["altura"]."<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;*/
}//SI

function f11(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT nombre from equipos where nombre LIKE 'H%' and nombre LIKE '%S'")){
        $sql->execute();
        $sql->bind_result($nombre);
        while($sql->fetch()){
            printf("- %s <br>", $nombre);
        }
        $sql -> close();
        return $sql;
    }
	/*$conexion = getConexion1();
	$sql = "SELECT nombre from equipos where nombre LIKE 'H%' and nombre LIKE '%S'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	echo "Ejercicio 11<br>";
    	while($row = $result->fetch_assoc()){
    		echo "- El equipo ".$row["nombre"]." empieza por H y termina en S<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;*/
}//SI

function f12(){
	$conexion = getConexion1();
	$sql = "SELECT nombre,procedencia,peso,altura from jugadores where procedencia = 'Arizona' and peso>100 and altura>182";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	echo "Ejercicio 12<br>";
    	while($row = $result->fetch_assoc()){
    		echo "-".$row["nombre"]." es de ".$row["procedencia"].", pesa ".$row["peso"]." y mide ".$row["altura"]."<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;
}

function f13(){
	$conexion = getConexion1();
	$sql = "SELECT count(*)as total from jugadores where procedencia = 'Argentina'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	while($row = $result->fetch_assoc()){
    		echo "13- El total de jugadores de Argentina es de ".$row["total"]."<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;
}

function f14(){
	$conexion = getConexion1();
	$sql = "SELECT nombre,altura from jugadores where posicion ='C' and altura=(select max(altura) from jugadores)";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
    	while($row = $result->fetch_assoc()){
    		echo "14- El pivot mas alto es ".$row["nombre"]." con una altura de ".$row["altura"]."<br>";
    	}
    } else {
    	echo "0 resultados";
    }
    $conexion->close();
	return $result;
}

function f15(){
    $conexion = getConexion1();
    $sql = "SELECT nombre_equipo, count(*)as NJ from jugadores where posicion ='C' group by nombre_equipo";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 15<br>";
        while($row = $result->fetch_assoc()){
            echo "-El equipo de ".$row["nombre_equipo"]." tiene ".$row["NJ"]." jugadores<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f16(){
    $conexion = getConexion1();
    $sql = "SELECT nombre,altura,peso from jugadores where posicion ='C' and altura=(select max(altura) from jugadores)";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "16- El pivot mas alto es ".$row["nombre"]." con una altura de ".$row["altura"]." y su peso es ".$row["peso"]."<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f17(){
    $conexion = getConexion1();
    $sql = "SELECT division from equipos,jugadores where jugadores.nombre_equipo=equipos.nombre and procedencia='Serbia'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 17<br>";
        while($row = $result->fetch_assoc()){
            echo "- Hay jugadores serbios en la division ".$row["division"]."<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f18(){
    $conexion = getConexion1();
    $sql = "SELECT distinct equipos.nombre from jugadores,equipos where equipos.nombre=jugadores.nombre_equipo and procedencia<>'Serbia'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 18<br>";
        while($row = $result->fetch_assoc()){
            echo "-El equipo ".$row["nombre"]." no tiene jugadores serbios<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}//REVISAR

function f19(){
    $conexion = getConexion1();
    $sql = "SELECT nombre,peso from jugadores where peso>(SELECT max(peso) from jugadores where procedencia='Spain')";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 19<br>";
        while($row = $result->fetch_assoc()){
            echo "-El jugador ".$row["nombre"]." con peso de ".$row["peso"]." pesa mas que el español mas pesado<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f20(){
    $conexion = getConexion1();
    $sql = "SELECT distinct nombre_equipo,ciudad from jugadores,equipos where equipos.nombre=jugadores.nombre_equipo and procedencia='Spain'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 20<br>";
        while($row = $result->fetch_assoc()){
            echo "-El equipo ".$row["nombre_equipo"]." de la ciudad de ".$row["ciudad"]." es español<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f21(){
    $conexion = getConexion1();
    $sql = "SELECT sum(puntos_por_partido) as puntos from estadisticas where jugador=(select codigo from jugadores where nombre='Pau Gasol')";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "21- Pau Gasol obtenido un total de ".$row["puntos"]." puntos<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f22(){
    $conexion = getConexion1();
    $sql = "SELECT nombre from equipos where conferencia='WEST'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 22<br>";
        while($row = $result->fetch_assoc()){
            echo "-El equipo ".$row["nombre"]." es de la conferencia oeste<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f23(){
    $conexion = getConexion1();
    $sql = "SELECT jugadores.nombre,sum(puntos_por_partido) as puntos from jugadores,equipos,estadisticas where estadisticas.jugador=jugadores.codigo and jugadores.nombre_equipo=equipos.nombre and nombre_equipo='Cavaliers' group by jugadores.nombre";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 23<br>";
        while($row = $result->fetch_assoc()){
            echo $row["nombre"]." => ".$row["puntos"]."<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f24(){
    $conexion = getConexion1();
    $sql = "SELECT nombre from jugadores where nombre like '__V%'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 24<br>";
        while($row = $result->fetch_assoc()){
            echo "-".$row["nombre"]."<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f25(){
    $conexion = getConexion1();
    $sql = "SELECT nombre_equipo,count(*) as j from jugadores,equipos where jugadores.nombre_equipo=equipos.nombre and conferencia='WEST' group by nombre_equipo";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 25<br>";
        while($row = $result->fetch_assoc()){
            echo "-El equipo ".$row["nombre_equipo"]." tiene ".$row['j']." jugadores<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f26(){
    $conexion = getConexion1();
    $sql = "SELECT avg(puntos_por_partido) as media from estadisticas where jugador=(select codigo from jugadores where nombre='Lebron James')";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "26- La media de puntos por partido de Lebron es ".$row["media"]." puntos<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f27(){
    $conexion = getConexion1();
    $sql = "SELECT asistencias_por_partido from estadisticas where jugador=(select codigo from jugadores where nombre='Jose Calderon') and temporada='07/08'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "27- Jose Calderon obtuvo en al temporada 07/08 ".$row["asistencias_por_partido"]." asistencias<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f28(){
    $conexion = getConexion1();
    $sql = "SELECT sum(puntos_por_partido) as total from estadisticas where jugador=(select codigo from jugadores where nombre='Lebron James') and (temporada ='03/04' or temporada ='04/05' or temporada ='05/06')";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "28- Lebron James ha obtenido ".$row["total"]." puntos entre las temporadas 03/04 a 05/06<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f29(){
    $conexion = getConexion1();
    $sql = "SELECT nombre_equipo,count(*) as j from jugadores,equipos where jugadores.nombre_equipo=equipos.nombre and conferencia='EAST' group by nombre_equipo";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 29<br>";
        while($row = $result->fetch_assoc()){
            echo "-El equipo ".$row["nombre_equipo"]." tiene ".$row['j']." jugadores<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f30(){
    $conexion = getConexion1();
    $sql = "SELECT jugadores.nombre,sum(tapones_por_partido) as t, nombre_equipo from estadisticas,jugadores,equipos where jugadores.codigo=estadisticas.jugador and equipos.nombre=jugadores.nombre_equipo and equipos.nombre='Lakers' group by jugador";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 30<br>";
        while($row = $result->fetch_assoc()){
            echo "-".$row["nombre"]." de los ".$row["nombre_equipo"]." tiene un total de tapones por partido de ".$row["t"]."<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f31(){
    $conexion = getConexion1();
    $sql = "SELECT nombre_equipo,avg(rebotes_por_partido) as t from estadisticas,jugadores,equipos where jugadores.codigo=estadisticas.jugador and equipos.nombre=jugadores.nombre_equipo and equipos.conferencia='East' group by equipos.nombre";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 31<br>";
        while($row = $result->fetch_assoc()){
            echo "-La media de robotes del equipo ".$row["nombre_equipo"]." es de ".$row["t"]."<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f32(){
    $conexion = getConexion1();
    $sql = "SELECT jugadores.nombre,sum(rebotes_por_partido) as t from estadisticas,jugadores,equipos where jugadores.codigo=estadisticas.jugador and equipos.nombre=jugadores.nombre_equipo and equipos.ciudad='Los Angeles' group by jugador";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 32<br>";
        while($row = $result->fetch_assoc()){
            echo "-".$row["nombre"]." tiene un total de rebotes de ".$row["t"]."<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f33(){
    $conexion = getConexion1();
    $sql = "SELECT nombre_equipo,count(*) as j,division from jugadores,equipos where jugadores.nombre_equipo=equipos.nombre and division='NorthWest' group by nombre_equipo";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 33<br>";
        while($row = $result->fetch_assoc()){
            echo "-".$row["nombre_equipo"]." tiene ".$row["j"]." jugadores<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f34(){
    $conexion = getConexion1();
    $sql = "SELECT procedencia,count(*) as t from jugadores where procedencia='Spain' or procedencia='France' group by procedencia";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 34<br>";
        while($row = $result->fetch_assoc()){
            echo "-".$row['procedencia']." tiene ".$row["t"]." jugadores<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f35(){
    $conexion = getConexion1();
    $sql = "SELECT count(*) as t from jugadores where nombre LIKE 'Y%'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "35- Numero de jugadores que empiezan por Y: ".$row['t']."<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f36(){
    $conexion = getConexion1();
    $sql = "SELECT nombre,puntos_por_partido from jugadores,estadisticas where jugadores.codigo=estadisticas.jugador and puntos_por_partido=0";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 36<br>";
        while($row = $result->fetch_assoc()){
            echo "-".$row['nombre']." obtubo ".$row["puntos_por_partido"]." puntos<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f37(){
    $conexion = getConexion1();
    $sql = "SELECT division,count(*) as t from jugadores,equipos where jugadores.nombre_equipo=equipos.nombre group by division";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 37<br>";
        while($row = $result->fetch_assoc()){
            echo "-La division ".$row["division"]." tiene ".$row["t"]."<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f38(){
    $conexion = getConexion1();
    $sql = "SELECT avg(peso) as t, (avg(peso)*2.20) as t2,(avg(peso)*0.45) as t3 from jugadores where nombre_equipo='Raptors'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo $row["t"]." kilos/libras equivale a ".$row["t2"]." libras o ha ".$row["t3"]." kilos <br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f39(){
    $conexion = getConexion1();
    $sql = "SELECT equipo_local, puntos_local as a, equipo_visitante, puntos_visitante as b FROM partidos order by a,b limit 1";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "39- El peor partido ha sido ".$row["equipo_local"]." con ".$row["a"]." puntos vs ".$row["equipo_visitante"]." con ".$row["b"]." puntos<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
}

function f40(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT nombre from jugadores order by nombre limit 10")){
        $sql->execute();
        $sql->bind_result($nombre);
        while($sql->fetch()){
            printf("-%s<br>", $nombre);
        }
        $sql -> close();
        return $sql;
    }
    /*$conexion = getConexion1();
    $sql = "SELECT nombre from jugadores order by nombre limit 10";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 40<br>";
        while($row = $result->fetch_assoc()){
            echo "-".$row['nombre']."<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;*/
}//SI

function f41(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT temporada, puntos_por_partido from estadisticas where jugador=(select codigo from jugadores where nombre='Kobe Bryant') order by puntos_por_partido desc limit 1")){
        $sql->execute();
        $sql->bind_result($temporada,$puntos_por_partido);
        while($sql->fetch()){
            printf("Temporada %s: Kebe Bryant obtuvo %s puntos<br>", $temporada,$puntos_por_partido);
        }
        $sql -> close();
        return $sql;
    }
    /*$conexion = getConexion1();
    $sql = "SELECT temporada, puntos_por_partido from estadisticas where jugador=(select codigo from jugadores where nombre='Kobe Bryant') order by puntos_por_partido desc limit 1";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "41- En la temporada ".$row["temporada"]." Kobe Bryant consiguio ".$row["puntos_por_partido"]."<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;*/
}//SI

function f42(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT count(*) as bases from jugadores,equipos where equipos.nombre=jugadores.nombre_equipo and conferencia='East' and posicion='G' group by posicion")){
        $sql->execute();
        $sql->bind_result($bases);
        while($sql->fetch()){
            printf("El numero de bases de la conferencia del este es de %s <br>", $bases);
        }
        $sql -> close();
        return $sql;
    }
    /*$conexion = getConexion1();
    $sql = "SELECT count(*) as bases from jugadores,equipos where equipos.nombre=jugadores.nombre_equipo and conferencia='East' and posicion='G' group by posicion";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "42- El numero de bases de la conferencia Este es de ".$row["bases"]." jugadores<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;*/
}//SI

function f43(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare( "SELECT conferencia,count(*) as eq from equipos group by conferencia")){
        $sql->execute();
        $sql->bind_result($conferencia,$eq);
        while($sql->fetch()){
            printf("La conferencia %s tiene %s equipos <br>", $conferencia,$eq);
        }
        $sql -> close();
        return $sql;
    }
    /*$conexion = getConexion1();
    $sql = "SELECT conferencia,count(*) as eq from equipos group by conferencia";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 43<br>";
        while($row = $result->fetch_assoc()){   
            echo "- El numero de equipos de la conferencia ".$row["conferencia"]." es de " .$row['eq']."<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;
    */
}//SI

function f44(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT distinct division from equipos where conferencia='East'")){
        $sql->execute();
        $sql->bind_result($division);
        echo "Ejercicio 44<br>";
        while($sql->fetch()){
            printf("-Division %s <br>", $division);
        }
        $sql -> close();
        return $sql;
    }
    /*$conexion = getConexion1();
    $sql = "SELECT distinct division from equipos where conferencia='East'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 44<br>";
        while($row = $result->fetch_assoc()){   
            echo "- Division ".$row["division"]."<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;*/
}//SI

function f45(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT jugadores.nombre,max(rebotes_por_partido)as maximo from jugadores,equipos,estadisticas where jugadores.codigo=estadisticas.jugador and equipos.nombre=jugadores.nombre_equipo and equipos.nombre='SUNS'")){
        $sql->execute();
        $sql->bind_result($nombre,$maximo);
        while($sql->fetch()){
            printf("%s con un numero de rebotes de %s\n", $nombre,$maximo);
        }
        $sql -> close();
        return $sql;
    }
    /*$conexion = getConexion1();
    $sql = "SELECT jugadores.nombre,max(rebotes_por_partido)as maximo from jugadores,equipos,estadisticas where jugadores.codigo=estadisticas.jugador and equipos.nombre=jugadores.nombre_equipo and equipos.nombre='SUNS'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 45<br>";
        while($row = $result->fetch_assoc()){   
            echo "-".$row["nombre"]." tiene un maximo de ".$row["maximo"]." rebotes<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;*/
}//SI

function f46(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT temporada,jugadores.nombre, max(puntos_por_partido) as maximo from jugadores,equipos,estadisticas where jugadores.codigo=estadisticas.jugador and equipos.nombre=jugadores.nombre_equipo group by temporada")){
        $sql->execute();
        $sql->bind_result($temporada,$nombre,$maximo);
        while($sql->fetch()){
            printf("Temporada %s: %s consiguio un maximo de %s puntos\n<br>", $temporada,$nombre,$maximo);
        }
        $sql -> close();
        return $sql;
    }
    /*$conexion = getConexion1();
    $sql = "SELECT temporada,jugadores.nombre, max(puntos_por_partido) as maximo from jugadores,equipos,estadisticas where jugadores.codigo=estadisticas.jugador and equipos.nombre=jugadores.nombre_equipo group by temporada";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 46<br>";
        while($row = $result->fetch_assoc()){   
            echo "-Temporada ".$row["temporada"].": ".$row["nombre"]." tiene un maximo de ".$row["maximo"]." puntos <br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;*/
}//SI

function f47(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT nombre,LENGTH(nombre) as tamaño from jugadores where nombre_equipo='Grizzlies'")){
        $sql->execute();
        $sql->bind_result($nombre,$tamaño);
        while($sql->fetch()){
            printf("-%s: tiene %s letras\n<br>", $nombre,$tamaño);
        }
        $sql -> close();
        return $sql;
    }
    /*$conexion = getConexion1();
    $sql = "SELECT nombre,LENGTH(nombre) as tamaño from jugadores where nombre_equipo='Grizzlies'";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 47<br>";
        while($row = $result->fetch_assoc()){   
            echo "-".$row["nombre"]." tiene ".$row["tamaño"]." letras<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;*/
}//SI

function f48(){
    $conexion = getConexion1();
    if($sql = $conexion->prepare("SELECT nombre, LENGTH(nombre) as tamaño from equipos order by tamaño desc LIMIT 1")){
        $sql->execute();
        $sql->bind_result($nombre,$tamaño);
        while($sql->fetch()){
            printf("-%s: tiene %s letras\n<br>", $nombre,$tamaño);
        }
        $sql -> close();
        return $sql;
    }
    /*$conexion = getConexion1();
    $sql = "SELECT nombre, LENGTH(nombre) as tamaño from equipos order by tamaño desc LIMIT 1";
    $result = $conexion->query($sql);
    if($result && $result->num_rows > 0){
        echo "Ejercicio 48<br>";
        while($row = $result->fetch_assoc()){   
            echo "-".$row["nombre"]." tiene ".$row["tamaño"]." letras<br>";
        }
    } else {
        echo "0 resultados";
    }
    $conexion->close();
    return $result;*/
}//SI

function f49(){
    
}
?>
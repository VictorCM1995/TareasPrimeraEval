<?php

//MYSQL
function getConexion2(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "dwes-03_funicular";
	$conn = new mysqli($servername, $username, $password, $db);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}

function mostrarAsientosNoReservados2(){
	$conexion = getConexion2();
	if($consulta = $conexion->prepare("SELECT numero,precio FROM plazas where reservada=0")){
		$consulta->execute();
		$consulta->bind_result($numero,$precio);
		while($consulta->fetch()){
			printf("<option>%s</option>",$numero,$precio);
		}
		$consulta->close();
	}
	$conexion->close();
	return $numero;
	/*$conexion = getConexion2();
	$sql = "SELECT numero from plazas where reservada=0";
	$result = $conexion->query($sql);
	if($result->num_rows>0){
		while($row = $result->fetch_assoc()){
			echo "<option>".$row["numero"]."</option>";
		}
	} else{
		echo "0 resultados";
	}
	$conexion->close();*/
}

function borrarPasajeros2(){
	$conexion = getConexion2();
	$sql = $conexion->prepare("DELETE from pasajeros");
	$sql->execute();
	$sql->close();
	$conexion->close();
	/*$conexion = getConexion2();
	$sql = "DELETE * from pasajeros";
	if($conexion->query()===TRUE){
		echo "Realizado";
	}else{
		echo "ERROR: ".$conexion->error;
	}
	$conexion->close();*/
}

function ceroReservas2(){
	$conexion = getConexion2();
	$sql = $conexion->prepare("UPDATE plazas set reservada=0");
	$sql->execute();
	$sql->close();
	$conexion->close();
	/*$conexion = getConexion2();
	$sql = "UPDATE plazas set reservada=0";
	if($conexion->query()===TRUE){
		echo "Realizado";
	}else{
		echo "ERROR: ".$conexion->error;
	}
	$conexion->close();*/
}

function darReserva2($n,$d,$nu){
	$conexion = getConexion2();
	$sql = $conexion->prepare("INSERT into pasajeros(dni, nombre, sexo ,numero_plaza) values(?,?,?,?)");
	$sql ->bind_param("sssi",$dni,$nombre,$sexo,$numero_plaza);
	$dni = $d;
	$nombre = $n;
	$sexo = "-";
	$numero_plaza = $nu;
	$sql->execute();
	$sql->close();
	$conexion->close();
	/*$conexion = getConexion2();
	$sql = "INSERT into pasajeros(dni, nombre, sexo ,numero_plaza) values($dni, $nombre, - ,$numplaza)";
	if($conexion->query($sql)==TRUE){
		echo "Realizado";
	} else{
		echo "Error: ".$sql."<b>".$conexion->error;
	}
	$conexion->close();*/
}

function mas1Reservas2($numero){
	$conexion = getConexion2();
	$sql = $conexion->prepare("UPDATE plazas set reservada=1 where numero=$numero");
	$sql->execute();
	$sql->close();
	$conexion->close();
	/*$conexion = getConexion2();
	$sql = "UPDATE plazas set reservada=1 where numero=$numero";
	if($conexion->query()===TRUE){
		echo "Realizado";
	}else{
		echo "ERROR: ".$conexion->error;
	}
	$conexion->close();*/
}

function todoP2(){
	$conexion = getConexion2();
	if($consulta = $conexion->prepare("SELECT numero,precio FROM plazas where reservada=0")){
		$consulta->execute();
		$consulta->bind_result($numero,$precio);
		while($consulta->fetch()){
			printf("Plaza %s : %s €<br>",$numero,$precio);
		}
		$consulta->close();
	}
	$conexion->close();
	return $numero;
}

function actualizar2($precio,$numero){
	$conexion = getConexion2();
	$sql = $conexion->prepare("UPDATE plazas set precio=$precio where numero=$numero");
	$sql->execute();
	$sql->close();
	$conexion->close();
}


//PDO
function getConexion1(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "dwes-03_funicular";
	try {
		$conn = new PDO("mysql:host=$servername;dbname=".$db, $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	return $conn;
}

function mostrarAsientosNoReservados1(){
	$conexion = getConexion1();
	$sql = $conexion->prepare("SELECT numero FROM plazas where reservada=0");
	$sql->setFetchMode(PDO::FETCH_ASSOC);
	$sql->execute();
	while($row = $sql->fetch()){
		echo "<option>".$row["numero"]."</option>";
	}
	/*$conexion = getConexion1();
	$sql = $conexion->query("SELECT numero,precio FROM plazas where reservada=0");
	$result = $sql->fetch();
	foreach($sql as $row){
		echo "<option>".$row["numero"]."(".$row["precio"]."€)</option>";
	}*/
}

function borrarPasajeros1(){
	$conexion = getConexion1();
	$sql = $conexion->prepare("DELETE from pasajeros");
	$sql->execute();
	/*$conexion = getConexion1();
	$sql = "DELETE from pasajeros";
	$conexion->exec($sql);
	echo "Realizado";
	$conexion = null;*/
}

function ceroReservas1(){
	$conexion = getConexion1();
	$sql = $conexion->prepare("UPDATE plazas set reservada=0");
	$sql->execute();
}

function darReserva1($n,$d,$nu){
	$conexion = getConexion1();
	$sql = $conexion->prepare("INSERT into pasajeros (dni,nombre,sexo,numero_plaza) values('$d','$n','-',$nu)");
	$sql->execute();
}

function mas1Reservas1($numero){
	$conexion = getConexion1();
	$sql = $conexion->prepare("UPDATE plazas set reservada=1 where numero=$numero");
	$sql->execute();
}

function todoP1(){
	$conexion = getConexion1();
	$sql = $conexion->prepare("SELECT numero,precio FROM plazas where reservada=0");
	$sql->setFetchMode(PDO::FETCH_ASSOC);
	$sql->execute();
	while($row = $sql->fetch()){
		echo "Plaza ".$row["numero"].": ".$row["precio"]."€ <br>";
	}
}

function actualizar1($precio,$numero){
	$conexion = getConexion1();
	$sql = $conexion->prepare("UPDATE plazas set precio=$precio where numero=$numero");
	$sql->execute();
}

function usuarioCorrecto1($u,$pd){
	$conexion = getConexion1();
	$sql = "SELECT usuario FROM usuarios where usuario='$u' and password='$pd'";
	$resultado = $conexion ->prepare($sql);
	$verificado = false;
	if(isset($sql)){
		$fila = $resultado -> fetch_array();
		if($fila != null){
			$verificado = true;
		}
	}
	$conexion = null;
	return $verificado;
}

?>
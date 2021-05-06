<?php
function getConexion1(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "dwes_02_libros";
	try {
		$conn = new PDO("mysql:host=$servername;dbname=".$db, $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	return $conn;
}

function getConexion2(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "dwes_02_libros";
	$conn = new mysqli($servername, $username, $password, $db);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}

function insertar($titulo,$año,$precio,$fecha){
	$conexion = getConexion1();
	$resultado = $conexion->prepare("INSERT INTO libros (Titulo, Año, Precio, Fecha) values ('$titulo',$año,$precio,'$fecha')");
	echo "Datos guardados correctamente";
	$resultado->execute();
	/*try{
		$conexion = getConexion();
		$sql = "INSERT INTO libros (Titulo, Año, Precio, Fecha) values ('$titulo',$año,$precio,'$fecha')";
		$conexion->exec($sql);
		echo "Insercion completada";
	}catch(PDOException $e){
		echo $sql."<br>". $e->getMessage();
	}
	$conn = null;*/
}

function mostrar(){
	$conexion = getConexion2();
	if($consulta = $conexion->prepare("SELECT Numero,Titulo,Año,Precio,Fecha FROM libros")){
		$consulta->execute();
		$consulta->bind_result($Numero,$Titulo,$Año,$Precio,$Fecha);
		while($consulta->fetch()){
			printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$Numero,$Titulo,$Año,$Precio,$Fecha);
		}
		$consulta->close();
	}
	$conexion->close();
	/*$conexion = getConexion2();
	$sql = "SELECT Numero,Titulo,Año,Precio,Fecha FROM libros";
    $result = $conexion->query($sql);
    $conexion->close();
	return $result;*/
}

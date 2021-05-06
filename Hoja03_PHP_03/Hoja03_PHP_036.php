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
	function conjugacion($array){
		$contador = 0;
		$num = rand(1,count($array));
		foreach($array as $ver){
			$con = substr($ver, 0, -2);
			$ter = substr($ver, -2);
			$clave = array_search($ver, $array);
			if($clave == $num){
				if($ter=="ar"){
					echo "PRESENTE DE INDICATICO DEL VERBO ".$ver."<br>";
					echo $con."o<br>";
					echo $con."as<br>";
					echo $con."a<br>";
					echo $con."amos<br>";
					echo $con."áis<br>";
					echo $con."an<br><br>";
				} else if($ter=="er"){
					echo "PRESENTE DE INDICATICO DEL VERBO ".$ver."<br>";
					echo $con."o<br>";
					echo $con."es<br>";
					echo $con."e<br>";
					echo $con."emos<br>";
					echo $con."éis<br>";
					echo $con."en<br><br>";
				} else if($ter=="ir"){
					echo "PRESENTE DE INDICATICO DEL VERBO ".$ver."<br>";
					echo $con."o<br>";
					echo $con."es<br>";
					echo $con."e<br>";
					echo $con."imos<br>";
					echo $con."ís<br>";
					echo $con."en<br><br>";
				}
			}
		}
	}
	$verbos = array(1=>"saltar",2=>"comer",3=>"vivir");
	conjugacion($verbos);
?>
</body>
</html>
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
	$temporal = "Juan";
	echo "El valor es ".gettype($temporal)."<br>";
	$temporal = 3.14;
	echo "El valor es ".gettype($temporal)."<br>";
	$temporal = false;
	echo "El valor es ".gettype($temporal)."<br>";
	$temporal = 3;
	echo "El valor es ".gettype($temporal)."<br>";
	$temporal = null;
	echo "El valor es ".gettype($temporal)."<br>";
?>
</body>
</html>
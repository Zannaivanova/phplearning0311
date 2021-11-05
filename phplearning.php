<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>4 смешанных типа: array</title>
</head>
<body>


<?php

$colors = array('red', 'blue', 'green', 'yellow');


foreach ($colors as &$color) {
    $color = strtoupper($color);
}
unset($color); /* это нужно для того, чтобы последующие записи в
$color не меняли последний элемент массива */

print_r($colors);
?>



<!-- 	https://www.php.net/manual/ru/language.types.array.php-->
</body>
</html>

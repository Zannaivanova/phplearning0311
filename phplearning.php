<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Типы PHP</title>
</head>
<body>
	 



<?php
$a_bool = TRUE;
$a_str = "foo";
$a_str2 = 'foo';
$an_int = 12;

echo gettype($a_bool); 
echo gettype($a_str);


//Если целое число, увеличить на четыре
if (is_int($an_int)){
	$an_int +=4;
}

//Если $a_bool - это строка, вывести её
if (is_string($a_bool)) {
	echo "Строка: $a_bool";
} 

echo PHP_INT_MAX;

?>



<!-- 	https://www.php.net/manual/ru/language.types.intro.php-->
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>4 скалярныe типа: Числовые строки</title>
</head>
<body>


<?php
 $foo = 1 + "10.5";                // $foo считается за число с плавающей точкой (11.5)
$foo = 1 + "-1.3e3";              // $foo считается за число с плавающей точкой (-1299)
// $foo = 1 + "bob-1.3e3";           // TypeError начиная с PHP 8.0.0. В более ранних версиях $foo считалось за целое число (1)
// $foo = 1 + "bob3";                // TypeError начиная с PHP 8.0.0, В более ранних версиях $foo считалось за целое число (1)
// $foo = 1 + "10 Small Pigs";       // $foo - целое (11). В PHP 8.0.0 создаётся ошибка уровня E_WARNING, а в более ранних версиях уровня E_NOTICE
// $foo = 4 + "10.2 Little Piggies"; // $foo - число с плавающей точкой (14.2). В PHP 8.0.0 создаётся ошибка уровня E_WARNING, а в более ранних версиях уровня E_NOTICE
// $foo = "10.0 pigs " + 1;          // $foo - число с плавающей точкой (11). В PHP 8.0.0 создаётся ошибка уровня E_WARNING, а в более ранних версиях уровня E_NOTICE
// $foo = "10.0 pigs " + 1.0;        // $foo - число с плавающей точкой (11). В PHP 8.0.0 создаётся ошибка уровня E_WARNING, а в более ранних версиях уровня E_NOTICE

echo var_dump($foo)
?>



<!-- 	https://www.php.net/manual/ru/language.types.string.php-->
</body>
</html>

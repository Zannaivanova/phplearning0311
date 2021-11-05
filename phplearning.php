<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>4 скалярныe типа: int</title>
</head>
<body>
	 

<?php
$a = 1234; // десятичное число
$a = 0123; // восьмеричное число (эквивалентно 83 в десятичной системе)
$a = 0x1A; // шестнадцатеричное число (эквивалентно 26 в десятичной системе)
$a = 0b11111111; // двоичное число (эквивалентно 255 в десятичной системе)
$a = 1_234_567; // десятичное число (с PHP 7.4.0)
?>


<!-- Пример #3 Переполнение целых на 64-битных системах -->

<?php
$large_number = 9223372036854775807;
var_dump($large_number);                     // int(9223372036854775807)

$large_number = 9223372036854775808;
var_dump($large_number);                     // float(9.2233720368548E+18)

$million = 1000000;
$large_number =  50000000000000 * $million;
var_dump($large_number);                     // float(5.0E+19)
?>


<?php
var_dump(25/7);         // float(3.5714285714286)
var_dump((int) (25/7)); // int(3)
var_dump(round(25/7));  // float(4)
?>


<!-- 	https://www.php.net/manual/ru/language.types.integer.php-->
</body>
</html>

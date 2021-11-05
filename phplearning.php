<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>4 скалярныe типа: "float", "double" или "real"</title>
</head>
<body>

<?php
$x = 8 - 6.4;  // which is equal to 1.6
$y = 1.6;
var_dump($x == $y); // is not true

// PHP thinks that 1.6 (coming from a difference) is not equal to 1.6. To make it work, use round()

// var_dump(round($x, 2) == round($y, 2)); // this is true

// This happens probably because $x is not really 1.6, but 1.599999.. and var_dump shows it to you as being 1.6.
?>


<!-- // Сравнение чисел с плавающей точкой  -->
<?php
$a = 1.23456789;
$b = 1.23456780;
$epsilon = 0.00001;

if (abs($a - $b) < $epsilon) {
    echo "true";
}
?>


<!-- 	https://www.php.net/manual/ru/language.types.float.php-->
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Стрелочные функции</title>
</head>
<body>

<?php//Пример #1 Стрелочные функции захватывают переменные по значению автоматически

$y = 1;

$fn1 = fn($x) => $x + $y;
// эквивалентно использованию $y по значению:
$fn2 = function ($x) use ($y) {
    return $x + $y;
};

var_export($fn1(3));
?>



<?php//Пример #2 Стрелочные функции захватывают переменные по значению автоматически, даже когда они вложены

$z = 1;
$fn = fn($x) => fn($y) => $x * $y + $z;
// Выведет 51
var_export($fn(5)(10));
?>



<?php //Пример #3 Примеры использования стрелочных функций

fn(array $x) => $x;
static fn(): int => $x;
fn($x = 42) => $x;
fn(&$x) => $x;
fn&($x) => $x;
fn($x, ...$rest) => $rest;

?>


<?php//Пример #4 Значения из внешней области видимости не могут быть изменены стрелочными функциями

$x = 1;
$fn = fn() => $x++; // Ничего не изменит
$fn();
var_export($x);  // Выведет 1

?>



<!-- https://www.php.net/manual/ru/functions.arrow.php-->
</body> 
</html>

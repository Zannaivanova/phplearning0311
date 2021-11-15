<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Объявление типов</title>
</head>
<body>

<!-- Пример #1 Объявление типа для класса -->
<?php 
class C{}
class D extends C{}

class E{}

function f(C $c){
	echo get_class($c)."\n";
}

f(new C);
f(new D);
f(new E);
?>

<!-- Пример #2 Объявление типа для интерфейса -->
<?php
interface I { public function f(); }
class C implements I { public function f() {} }

// Не реализует интерфейс I.
class E {}

function f(I $i) {
    echo get_class($i)."\n";
}

f(new C);
f(new E);
?>

<!-- Пример #3 Объявление типа возвращаемого значения -->
<?php 
function sum($a, $b): float {
	  return $a+$b;
}

var_dump(sum(1,2));
?>


<!-- Пример #4 Возвращение объекта -->
<?php 
class C{}

function getC(): C{
	return new C;
}

var_dump(getC());
?>


<!-- Пример #5 Объявление обнуляемых типов -->
<?php 
class C {}

function f(?C $c){
	var_dump($c);
}

f(new C);
f(null);
?>


<!-- Пример #6 Обнуляемые типы для возвращаемого значения -->
<?php 
function get_item(): ?string {
	if (isset($_GET['item'])){
		return $_GET['item'];
	} else {
		return null;
	}
}
?>


<!-- Пример #7 Старый способ задавать обнуляемые типы для аргументов -->
<?php 
class C{}

function f(C $c = null){
	var_dump($c);
}

f(new C);
f(null);
?>

<!-- Пример #8 Строгая типизация для значений аргументов -->
<?php  
declare(strict_types=1);

function sum(int $a, int $b){
	return $a + $b;
}

var_dump(sum(1,2));
var_dump(sum(1.5, 2.5));
?>



<!-- https://www.php.net/manual/ru/language.types.declarations.php -->
</body>
</html>

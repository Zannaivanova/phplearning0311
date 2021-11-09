<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>4 смешанные типа: iterable</title>
</head>
<body>

<!-- Пример #1 Пример использования iterable в качестве параметра -->

<?php 
function foo(iterable $iterable){
	foreach ($iterable as $value){
		//...
	}
}
 ?>

<!-- Пример #2 Пример установки значения по умолчанию для iterabl -->
<?php 
function foo (iterable $iterable = []){
}	
 ?>

<!-- Пример #3 Пример использования iterable в качестве возвращаемого типа  -->
<?php 
function bar(): iterable{
	return [1,2,3];
} ?>

<!-- Пример #4 Пример использования iterable в качестве возвращаемого значения генератора  -->
<?php 
function gen(): iterable{
	yield 1;
	yield 2;
	yield 3;
} ?>


<!-- 	https://www.php.net/manual/ru/language.types.iterable.php->

</body>
</html>

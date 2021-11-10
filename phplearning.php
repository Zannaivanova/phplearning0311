<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>2 специальных типа: NULL </title>
</head>
<body>

<!-- ей была присвоена константа null -->
<?php 
$var = NULL;
 ?>


<!-- ей ещё не было присвоено никакого значения. -->
<!-- Пример #1 Пример использования is_null() -->
<?php 
error_reporting(E_ALL);

$foo = NULL;
var_dump(is_null($inexistent), is_null($foo));
 ?>


<!-- она была удалена с помощью unset(). -->
<?php
function destroy_foo()
{
    global $foo;
    unset($foo);
}

$foo = 'bar';
destroy_foo();
echo $foo;
?>








<!-- https://www.php.net/manual/ru/language.types.null.php -->
 	
 </body>
</html>

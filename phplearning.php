
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Глобальное пространство</title>
</head>
<body>

<?php //Пример #1 Использование глобального пространства и его задание
namespace A\B\C;

function fopen(){
$f = \fopen(...);
return $f;	
 
}?>
<!-- https://www.php.net/manual/ru/language.namespaces.global.php -->
</body> 
</html>

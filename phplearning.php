
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Класс WeakReference</title>
</head>
<body>

<?php//Пример #1 Пример #1. Простое использование WeakReference

$obj = new stdClass;
$weakref = WeakReference::create($obj);
var_dump($weakref->get());
unset($obj);
var_dump($weakref->get());
 ?>

 
<!-- https://www.php.net/manual/ru/class.weakreference.php -->
</body> 
</html>





























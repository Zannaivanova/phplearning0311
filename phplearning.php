<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Автоматическая загрузка классов</title>
</head>
<body>

<?php  //Пример #1 Пример автоматической загрузки
spl_autoload_register(function($class_name){
	include $class_name . 'php';
});

$obj = new MyClass1();
$obj2 = new MyClass2();
?>


<?php  //Пример #2 Ещё один пример автоматической загрузки
spl_autoload_register(function($name){
	var_dump($name);
});

class Foo implements ITEST{
}
?>


<?php  //Пример #3 Автоматическая загрузка с перехватом исключения

spl_autoload_register(function($name){
	echo "хочу загрузить $name .\n";
	throw new Exeption ("Невозможно загрузить $name .\n");
});

try {
	$obj = new NonLoadableClass();
} catch (Exeption $e){
	echo $e->getMessage(), "\n";
}
?>
<!-- https://www.php.net/manual/ru/language.oop5.autoload.php-->
</body> 
</html>

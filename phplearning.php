<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>4 смешанных типа: callable </title>
</head>
<body>
<!--Пример #2 Пример callback-функции с использованием замыкания --> 

<?php
// Наше замыкание
$double = function($a) {
    return $a * 2;
};

// Диапазон чисел
$numbers = range(1, 5);

// Использование замыкания в качестве callback-функции
// для удвоения каждого элемента в нашем диапазоне
$new_numbers = array_map($double, $numbers);

print implode(' ', $new_numbers);
?>



<!-- Пример #1 Пример callback-функции -->

<!-- // Пример callback-функции -->
function my_callback_function(){
	echo 'Привет, мир';
}

<!-- // Пример callback-метода -->
class MyClass {
	static function myCallbackMethod(){
		echo 'Привет, мир';
	}
}

<!-- // Тип 1: Простой callback -->
call_user_func('my_callback_function');

<!-- // Тип 2: Вызов статического метода класса -->
call_user_func(array('MyClass','myCallbackMethod'));

<!-- // Тип 3: Вызов метода класса -->
$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod'));

<!-- // Тип 4: Вызов статического метода класса -->
call_user_func('MyClass::myCallbackMethod');

<!-- // Тип 5: Вызов относительного статического метода -->
class A{
	public static function who(){
		echo "A\n";
	}
}

class B extends A{
	public static function who(){
		echo "B\n";
	}
}

call_user_func(array('B', 'parent::who'));



<!-- // Тип 6: Объекты, реализующие __invoke, могут быть использованы как callback -->
class C{
	public function __invoke($name){
		echo 'ПРивет', $name, "\n";
	}
}

$c = new C();
call_user_func($c, 'PHP');
 ?>
}


<!-- https://www.php.net/manual/ru/language.types.callable.php -->	
 
</body>
</html>

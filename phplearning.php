<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Оператор разрешения области видимости (::)</title>
</head>
<body>


<?php//Пример #1 Использование :: вне объявления класса
class MyClass{
	const CONST_VALUE = 'Значение константы';
}

$classname = 'MyClass';
echo $classname::CONST_VALUE;

echo MyClass::CONST_VALUE;
?>


<?php  //Пример #2 Использование :: внутри объявления класса
class OtherClass extends MyClass{
	public static $my_static = 'статическая переменная';

	public static function doubleColon(){
		echo parent::CONST_VALUE . "\n";
		echo self::$my_static . "\n";
	}
}

$classname = 'OtherClass';
$classname::doubleColon();

OtherClass::doubleColon();
?>



<?php//Пример #3 Обращение к методу в родительском классе
class MyClass{
	protected function myFunc(){    // Переопределить родительское определение
		echo "MyClass::myFunc()\n";
	}
}  

class OtherClass extends MyClass{
	public function myFunc(){        // Но всё ещё вызываем родительскую функцию
		parent::myFunc();
		echo "OtherClass::myFunc()\n";
	}
}

$class = new OtherClass();
$class->myFunc();
?>


<!-- https://www.php.net/manual/ru/language.oop5.paamayim-nekudotayim.php -->
</body> 
</html>

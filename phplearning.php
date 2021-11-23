<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Классы и объекты: Основы</title>
</head>
<body>
<!-- Особенности объектной модели
-видимость
-абстрактные
-ненаследуемые
-магические методы
-интерфейсы
-клонирование
-объекты и ссылки. -->

<?php  //Пример #1 Простое определение класса

class SimpleClass{
	public $var = 'значение по умолчанию';    // объявление свойства

	public function displayVar(){    // объявление метода
		echo $this->var;
	}
}
?>

<?php  //Пример #2 Некоторые примеры псевдо-переменной $this
class A
{
    function foo()
    {
        if (isset($this)) {
            echo '$this определена (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this не определена.\n";
        }
    }
}

class B{
	function bar(){
		A::foo();
	}
}

$a = new A();
$a->foo();

$b = new B();
$b->bar();

B::bar();
?>

<?php  //new Пример #3 Создание экземпляра класса
$instance = new SimpleClass();

// Это же можно сделать с помощью переменной:
$className = 'SimpleClass';
$instance = new $className();// new SimpleClass()
?>



<?php  //Пример #4 Присваивание объекта
$instance = new SimpleClass();

$assigned = $instance;
$reference = &$instance;

$instance->var = '$assigned будет иметь это значение'; 

$instance = null;

var_dump($instance);
var_dump($reference);
var_dump($assigned);
?>


<?php  //Пример #5 Создание новых объектов
class Test{
	static public function getNew(){
		return new static;
	}
}

class Child extends Test {}

$obj1 = new Test();
$obj2 = new $obj1;
var_dump($obj1 !==$obj2);

$obj3 = Test::getNew();
var_dump($obj3 instanceof Test);

$obj4 = Child::getNew();
var_dump($obj4 instanceof Child);

?>


<?php  //Пример #6 Доступ к свойствам/методам только что созданного объекта

echo (new DateTime())-> format('Y');
?>



<?php  //Пример #7 Доступ к свойству vs. вызов метода
class Foo{
	public $bar = 'свойство';

	public function bar(){
		return 'метод';
	}
}

$obj = new Foo();
echo $obj->bar, PHP_EOL, $obj->bar(), PHP_EOL;
?>



<?php  //Пример #8 Вызов анонимной функции, содержащейся в свойстве
class Foo{
	public $bar;

	public function __construct(){
		$this-> bar = function(){
			return 42;
		};
	}
}

$obj = new Foo();

echo ($obj->bar)(), PHP_EOL;
?>


<?php  //Пример #9 Простое наследование классов
class ExtendClass extends SimpleClass{
	function displayVar(){
		echo"Расширенный класс\n";
		parent::displayVar();
	}
}

$extended = new ExtendClass();
$extended-> displayVar();
?>


<?php //Пример #10 Совместимость дочерних методов
class Base{
	public function foo(int $a){
		echo "Допустимо\n";
	}
}	

class Extend1 extends Base{
	function foo(int $a = 5){
		parent::foo($a);
	}
}	

class Extend2 extends Base{
	function foo(int $a, $b = 5){
		parent::foo($a);
	}
}	


$extended1 = new Extend1();
$extended1->foo();
$extended2 = new Extend2();
$extended2->foo(1);
 ?>


<?php  //Пример #11 Фатальная ошибка, когда дочерний метод удаляет параметр
class Base{
	public function foo(int $a = 5){
		echo "Допустимо\n";
	}
}

class Extend extends Base{
	function foo(){
		parent::foo(1);
	}
}
?>

<?php  //Пример #12 Фатальная ошибка, когда дочерний метод делает необязательный параметр обязательным.
 class Base{
 	public function foo(int $a = 5){
 		echo"Допустимо\n";
 	}
 }

 class Extend extends Base{
 	function foo(int $a){
 		parent::foo($a);
 	}
 }
?>


<?php//Пример #13 Ошибка при использовании именованных аргументов и параметров, переименованных в дочернем классе
class A{
	public function test($foo, $bar){}
}

class B extends A{
	public function test($a, $b){}
}

$obj = new B;

// Передача параметров согласно контракту A::test()
$obj->test(foo:"foo", bar:"bar");// ОШИБКА!
?>


<?php  //Пример #14 Разрешение имени класса
namespace NS {
	class ClassName{
	}

	echo ClassName::class;
}
?>


<?php // Пример #15 Отсутствует разрешение имени класса
print Does\Not\Exist::class;
?>



<?php //Пример #16 Разрешение имени объекта
namespace NS{
	class ClassNamme{
	}
} 

$c = new ClassName();
print $c::class;
?>


<?php //Пример #17 Оператор Nullsafe

$result = $repository?->getUser(5)?->name;

if (is_null($repository)){
	$result = null;
} else {
	$user = $repository->getUser(5);
	if (is_null($user)){
		$result = null;
	} else {
		$result = $user->name;
	}
}

 ?>

<!-- https://www.php.net/manual/ru/language.oop5.basic.php-->
</body> 
</html>

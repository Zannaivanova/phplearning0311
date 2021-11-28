<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Трейты</title>
</head>
<body>

<?php//Пример #1 Пример использования трейта
trait ezcReflectionReturnInfo {
function getReturnType(){/*1*/}
function getReturnDescription(){/*2*/}
}

class ezcReflectionMethod extends ReflectionMethod {
	use ezcReflectionReturnInfo;
	....
}

class ezcReflectionFunction extends ReflectionFunction {
	use ezcReflectionReturnInfo;
	....
}
 ?>


<?php//Пример #2 Пример приоритета старшинства
class Base  {
	public function sayHello(){
		echo 'Hello';
	}
}

trait SayWorld {
	public function sayHello(){
		parent::sayHello();
		echo 'World!';
	}
}

class MyHelloWorld extends Base {
	use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();
?>



<?php//Пример #3 Пример альтернативного порядка приоритета
trait HelloWorld {
    public function sayHello() {
        echo 'Hello World!';
    }
}

class TheWorldIsNotEnough {
    use HelloWorld;
    public function sayHello() {
        echo 'Hello Universe!';
    }
}

$o = new TheWorldIsNotEnough();
$o->sayHello();
?>


<?php  //Пример #4 Пример использования нескольких трейтов
trait Hello {
	public function sayHello(){
		echo 'Hello';
	}
}

trait World {
	public function sayWorld(){
		echo 'World';
	}
}

class MyHelloWorld {
	use Hello, World;
	public function sayExclamationMark(){
		echo '!';
	}
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWorld();
$o->sayExclamationMark();
?>


<?php  //Пример #5 Пример разрешения конфликтов
trait A{
	public function smallTalk(){
		echo 'a';
	}

	public function bigTalk(){
		echo 'A';
	}
}

trait B {
	public function smallTalk(){
		echo 'b';
	}
	public function bigTalk(){
		echo 'B';
	}
}

class Talker {
	use A,B {
		B::smallTalk insteadof A;
		A::bigTalk insteadof B;
	}
}

class Aliased_Talker {
	use A, B {
		B::smallTalk insteadof A;
		A::bigTalk insteadof B;
		B::bigTalk as talk;
	}
}
?>

<?php  //Пример #6 Пример изменения видимости метода
trait HelloWorld {
	public function sayHello(){
		echo 'Hello World!';
	}
}

class MyClass1 {// Изменение видимости метода sayHello
	use HelloWorld {
		sayHello as protected;
	}
}
// Создание псевдонима метода с изменённой видимостью
// видимость sayHello не изменилась

class MyClass2 {
	use HelloWorld { sayHello as private myPrivateHello;}
}
?>


<?php //Пример #7 Пример трейтов, составленных из трейтов
trait Hello {
	public function sayHello(){
		echo "Hello";
	}
} 

trait World {
	public function sayWorld(){
		echo 'World!';
	}
}

trait HelloWorld {
	use Hello, World;
}

class MyHelloWorld {
	use HelloWorld;
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWorld();
?>

<?php  //Пример #8 Требования трейта при помощи абстрактных методов
trait Hello {
	public function sayHelloWorld(){
		echo 'Hello'.$this->getWorld();
	}
	abstract public function getWorld();
}

class MyHelloWorld {
	private $world;
	use Hello;
	public function getWorld(){
		return $this->world;
	}

	public function setWorld($val){
		$this->world = $val;
	}
}
?>


<?php  //Пример #9 Статические переменные
trait Counter {
	public function inc (){
		static $c = 0;
		$c = $c+1;
		echo "$c\n";
	}
}

class C1 {
	use Counter;
}

class C2 {
	use Counter;
}

$o = new C1(); $o->inc();
$p = new C2(); $p-> inc();
?>


<?php  //Пример #10 Статические методы
trait StaticExample {
	public static function doSomething(){
		return 'Что-либо делаем';
	}
}

class Example {
	use StaticExample;
}

Example::doSomething();
?>


<?php//Пример #11 Статические свойства
trait StaticExample {
	public static $static = 'foo';
}  

class Example {
	use StaticExample;
}

echo Example::$static;
?>


<?php//Пример #12 Определение свойств
trait PropertiesTrait {
	public $x = 1;
} 

class PropertiesExample{
	use PropertiesTrait;
}

$example = new PropertiesExample;
$example->x;
 ?>


 <?php //Пример #13 Разрешение конфликтов
 trait PropertiesTrait {
    public $same = true;
    public $different = false;
}

class PropertiesExample {
    use PropertiesTrait;
    public $same = true;
    public $different = true; // Фатальная ошибка
}
  ?>

<!-- https://www.php.net/manual/ru/language.oop5.traits.php -->
</body> 
</html>

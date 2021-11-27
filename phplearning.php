<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Область видимости</title>
</head>
<body>

<?php  //Пример #1 Объявление свойства класса
/**
 * Область видимости свойства
 */

class MyClass {
	public $public = 'Public';
	protected $protected = 'Protected';
	private $private = 'Private';

	function printHello(){
		echo $this->public;
		echo $this->protected;
		echo $this->private;
	}
}

$obj = new MyClass();
echo $obj->public;// Работает
echo $obj->protected;// Неисправимая ошибка
echo $obj->private;// Неисправимая ошибка
$obj->printHello();// Выводит Public, Protected и Private

/**
 * Определение MyClass2
 */

class MyClass2 extends MyClass{
	public $public = 'Public2';
	protected $protected ='Protected2';

	function printHello(){
		echo $this->public;
		echo $this->protected;
		echo $this->private;

	}
}

$obj2 = new MyClass2();
echo $obj2->public;// Работает
echo $obj2->private;// Неопределён
echo $obj2->protected;// Неисправимая ошибка
$obj2->printHello();// Выводит Public2, Protected2, Undefined
?>


<?php //Пример #2 Объявление метода
/**
 * Область видимости метода
 */
class MyClass{//Определение MyClass
	public function __construct(){}    // Объявление общедоступного конструктора

	public function MyPublic(){}    // Объявление общедоступного метода

	protected function MyProtected(){}     // Объявление защищённого метода

	private function MyPrivate(){}   // Объявление закрытого метода

	function Foo(){    // Это общедоступный метод
		$this->MyPublic();
		$this->MyProtected();
	    $this->MyPrivate();
	}
}

$myclass = new MyClass;
$myclass->MyPublic();// Работает
$myclass->MyProtected(); // Неисправимая ошибка
$myclass->MyPrivate(); // Неисправимая ошибка
$myclass->Foo(); // Работает общедоступный, защищённый и закрытый

/**
 * Определение MyClass2
 */

class MyClass2 extends MyClass{
	function Foo2(){ // Это общедоступный метод
		$this->MyPublic();
		$this->MyProtected();
		$this->MyPrivate();// Неисправимая ошибка
	}
}

$myclass2 = new MyClass2;
$myclass2->MyPublic();// Работает
$myclass2->Foo2();// Работает общедоступный и защищённый, закрытый не работает


class Bar{
	public function test(){
		$this->testPrivate();
		$this->testPublic();
	}

	public function testPublic(){
		echo "Bar::testPublic\n";
	}

	private function testPrivate(){
		echo "Bar::testPrivate\n";
	}
} 

class Foo extends Bar{
public function testPublic(){
	echo "Foo::testPublic\n";
}

private function testPrivate(){
	echo"Foo::testPrivate\n";
 }
}

$myFoo = new Foo();
$myFoo->test()// Bar::testPrivate
               // Foo::testPublic
?>


<?php  //Пример #3 Объявление констант, начиная с PHP 7.1.0

/**
 * Область видимости констант
 */
class MyClass{//Объявление класса MyClass
	public const MY_PUBLIC = 'public';    // Объявление общедоступной константы

	protected const  MY_PROTECTED = 'protected';    // Объявление защищённой константы

	private const MY_PRIVATE = 'private';    // Объявление закрытой константы

	public function foo(){
		echo self::MY_PUBLIC;
		echo self::MY_PROTECTED;
		echo self::MY_PRIVATE
	}
}

$myclass = new MyClass();
MyClass::MY_PUBLIC;// Работает
MyClass::MY_PROTECTED;// Неисправимая ошибка
MyClass::MY_PRIVATE; // Неисправимая ошибка
$myclass->foo(); // Выводятся константы public, protected и private


/**
 * Объявление класса MyClass2
 */

class MyClass2 extends MyClass{
	function foo2(){    // Публичный метод
		echo self::MY_PUBLIC;
		echo self::MY_PROTECTED;
		echo self::MY_PRIVATE; // Неисправимая ошибка
	}
}
 $myclass2 = new MyClass2;
 echo MyClass2::MY_PUBLIC; // Работает
 $myclass2->foo(); // Выводятся константы public и protected, но не private
?>


<?php //Пример #4 Доступ к элементам с модификатором private из объектов одного типа

/**
 * Видимость из других объектов
 */

 class Test {
 	private $foo;

 	public function __constructor($foo){
 		$this->foo = $foo;
 	}

 	private function bar(){
 		echo 'Доступ к закрытому методу.';
 	}

 	public function baz(Test $other){
 		$other->foo = 'привет';        // Мы можем изменить закрытое свойство:
        var_dump($other->foo);

        $other->bar();        // Мы также можем вызвать закрытый метод:
 	}
 }

 $test = new Test('test');

 $test->baz(new Test('other'));
 ?>

<!-- https://www.php.net/manual/ru/language.oop5.visibility.php -->
</body> 
</html>

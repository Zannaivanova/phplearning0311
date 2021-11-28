<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ключевое слово static</title>
</head>
<body>

<?php  //Пример #1 Пример статического метода
class Foo{
	public static function aStaticMethod(){
		//...
	}
}

Foo::aStaticMethod();
$classname = 'Foo';
$classname::aStaticMethod();
?>



<?php  //Пример #2 Пример статического свойства
class Foo{
	public static $my_static = 'foo';

	public function staticValue(){
		return self::$my_static;
	}
}

class Bar extends Foo{
	public function fooStatic(){
		return parent::$my_static;
	}
}

print Foo::$my_static . "\n";

$foo = new Foo();
print $foo->staticValue() . "\n";
print $foo->my_static . "\n";

print $foo::$my_static . "\n";
$classname = 'Foo';
print $classname::$my_static . "\n";

print Bar::$my_static . "\n";
$bar = new Bar();
print $bar->fooStatic() . "\n";
?>

<!-- https://www.php.net/manual/ru/language.oop5.static.php -->
</body> 
</html>

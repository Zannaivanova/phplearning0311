<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Константы классов</title>
</head>
<body>


<?php  //Пример #1 Объявление и использование константы
class MyClass
{
    const CONSTANT = 'значение константы';

    function showConstant() {
        echo  self::CONSTANT . "\n";
    }
}

echo MyClass::CONSTANT . "\n";

$classname = "MyClass";
echo $classname::CONSTANT . "\n";

$class = new MyClass();
$class->showConstant();

echo $class::CONSTANT."\n";
?>



<?php  //Пример #2 Пример использования ::class с пространством имён
namespace foo {
    class bar {
    }

    echo bar::class; // foo\bar
}
?>


<?php  //Пример #3 Пример констант, заданных выражением
const ONE = 1;

class foo{
	const TWO = ONE *2;
	const THREE = ONE + self::TWO;
	const SENTENCE = 'значение константы THREE - '. self::THREE;
}
?>


<?php  //Пример #4 Модификаторы видимости констант класса, начиная с PHP 7.1.0
class Foo{
	public const BAR = 'bar';
	private const BAZ = 'baz';
}

echo Foo::BAR, PHP_EOL;
echo Foo::BAZ, PHP_EOL;


?>

<!-- https://www.php.net/manual/ru/language.oop5.constants.php-->
</body> 
</html>

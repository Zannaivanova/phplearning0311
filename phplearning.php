<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Обращение к функциям через переменные</title>
</head>
<body>

<?php //Пример #1 Работа с функциями посредством переменных
function foo(){
echo "В foo(); <br/>\n"; 
}

function bar($arg = ''){
	echo "В bar(); аргумент был '$arg'.<br/>\n";
}

$func = 'foo';
$func();

$func = 'bar';
$func('test');

$func = 'echoit';
$func('test');
?>


<?php //Пример #2 Обращение к методам класса посредством переменных
class Foo
{
    function Variable()
    {
        $name = 'Bar';
        $this->$name(); // Вызываем метод Bar()
    }

    function Bar()
    {
        echo "Это Bar";
    }
}

$foo = new Foo();
$funcname = "Variable";
$foo->$funcname();  // Обращаемся к $foo->Variable()
?>

<?php  //Пример #3 Пример вызова переменного метода со статическим свойством
class Foo{
	static $variable = 'статическое свойство';
	static function Variable(){
		echo 'Вызов метода Variable';
	}
}

echo Foo::$variable;// Это выведет 'статическое свойство'. Переменная $variable будет разрешена в этой области видимости.
$variable = "Variable";
Foo::$variable();// Это вызовет $foo->Variable(), прочитав $variable из этой области видимости.
?>



<?php  //Пример #4 Сложные callable-функции
class Foo{
	static function bar(){
		echo "bar\n";
	}

	function baz(){
		echo "baz\n";
	}
}

$func = array("Foo", "bar");
$func();// выведет "bar"
$func = array(new Foo, "baz");
$func();// выведет "baz"
$func = "Foo::bar";
$func();// выведет "bar"
?>


<!-- https://www.php.net/manual/ru/functions.variable-functions.php-->
</body> 
</html>

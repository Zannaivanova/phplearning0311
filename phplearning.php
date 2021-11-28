<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Интерфейсы объектов</title>
</head>
<body>


<?php //Пример #1 Пример интерфейса

// Объявим интерфейс 'Template'
interface Template
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// Реализация интерфейса
// Это будет работать
class WorkingTemplate implements Template
{
    private $vars = [];

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }

    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }

        return $template;
    }
}

// Это не будет работать
// Fatal error: Class BadTemplate contains 1 abstract methods
// and must therefore be declared abstract (Template::getHtml)
// (Фатальная ошибка: Класс BadTemplate содержит 1 абстрактный метод
// и поэтому должен быть объявлен абстрактным (Template::getHtml))
class BadTemplate implements Template
{
    private $vars = [];

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
}
?>


<?php  //Пример #2 Наследование интерфейсов
interface A{
	public function foo();
}

interface B extends A{
	public function baz(Baz $baz);
}

class C implements B{
	public function foo()
	{}

	public function baz(Baz $baz){}
}

class D implements B{
	public function foo(){}

	public function baz(Foo $foo)
}
?>



<?php  //Пример #3 Множественное наследование интерфейсов
interface A{
	public function foo();
}

interface B{
	public function bar();
}

interface C extends A,B {
public function baz();
}

class D implements C{
	public function foo(){}
	public function bar(){}
	public function baz(){}
}
?>


<?php  //Пример #4 Интерфейсы с константами
interface A {
	const B = 'Константа интерфейса';
}	
;
}

// Выведет: Константа интерфейса
echo A::B;


// Это, однако, не будет работать, так как
// константы переопределять нельзя.
	class B implements A{
		const B = 'Константа класса';
	}
?>


<?php  //Пример #5 Интерфейсы с абстрактными классами
interface A{
	public function foo(string $s); string;

	public function bar(int $i): int;
}

// Абстрактный класс может реализовывать только часть интерфейса.
// Классы, расширяющие абстрактный класс, должны реализовать все остальные.

abstract class B implements A{
	public function foo(string $s): string{
		return $s .PHP_EOL;
	}
}

class C extends B{
	public function bar(int $i):int{
		return$i*2;
	}
}
?>



<?php  //Пример #6 Одновременное расширение и внедрение
class One{

}

interface  Usable{

}

interface Updatable{

}

}

// Порядок ключевых слов здесь важен. "extends" должно быть первым.
class Two extends One implements Usable, Updatable{

}
?>

<!-- https://www.php.net/manual/ru/language.oop5.interfaces.php -->
</body> 
</html>

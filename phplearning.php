<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>4 скалярныe типа: string</title>
</head>
<body>


//Одинарные кавычки
<br><?php
echo 'это простая строка';


echo 'Также вы можете вставлять в строки
символ новой строки вот так,
это нормально';

// Выводит: Однажды Арнольд сказал: "I'll be back"
echo 'Однажды Арнольд сказал: "I\'ll be back"';

// Выводит: Вы удалили C:\*.*?
echo 'Вы удалили C:\\*.*?';

// Выводит: Вы удалили C:\*.*?
echo 'Вы удалили C:\*.*?';

// Выводит: Это не будет развёрнуто: \n новая строка
echo 'Это не будет развёрнуто: \n новая строка';

// Выводит: Переменные $expand также $either не разворачиваются
echo 'Переменные $expand также $either не разворачиваются';
?>

<br>
<?php 
$juice = "apple";

echo "He drank some $juice juice.".PHP_EOL;

//Некорректно. 's' - верный символ для имени переменной, но переменная имеет имя $juice.
echo "He drank some juice made of $juices.";

// Корректно. Строго указан конец имени переменной с помощью скобок:
echo "He drank some juice made of ${juice}s.";

?>

<br>
// двойными кавычками

<br>
//heredoc-синтаксисом

<?php
$values = [<<<END
a
  b
    c
END, 'd e f'];
var_dump($values);
?>


<?php
$str = <<<EOD
Пример строки,
охватывающей несколько строк,
с использованием heredoc-синтаксиса.
EOD;

/* Более сложный пример с переменными. */
class foo
{
    var $foo;
    var $bar;

    function __construct()
    {
        $this->foo = 'Foo';
        $this->bar = array('Bar1', 'Bar2', 'Bar3');
    }
}

$foo = new foo();
$name = 'Имярек';

echo <<<EOT
Меня зовут "$name". Я печатаю $foo->foo.
Теперь я вывожу {$foo->bar[1]}.
Это должно вывести заглавную букву 'A': \x41
EOT;
?>



<br>
//nowdoc-синтаксисом 


<?php
/* Более сложный пример с переменными. */
class foo
{
    public $foo;
    public $bar;

    function __construct()
    {
        $this->foo = 'Foo';
        $this->bar = array('Bar1', 'Bar2', 'Bar3');
    }
}

$foo = new foo();
$name = 'Имярек';

echo <<<'EOT'
Меня зовут "$name". Я печатаю $foo->foo.
Теперь я печатаю {$foo->bar[1]}.
Это не должно вывести заглавную 'A': \x41
EOT;
?>


<!-- 	https://www.php.net/manual/ru/language.types.string.php-->
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Наследование</title>
</head>
<body>

<?php

class Foo
{
    public function printItem($string)
    {
        echo 'Foo: ' . $string . PHP_EOL;
    }

    public function printPHP()
    {
        echo 'PHP просто супер.' . PHP_EOL;
    }
}

class Bar extends Foo
{
    public function printItem($string)
    {
        echo 'Bar: ' . $string . PHP_EOL;
    }
}

$foo = new Foo();
$bar = new Bar();
$foo->printItem('baz'); // Выведет: 'Foo: baz'
$foo->printPHP();       // Выведет: 'PHP просто супер'
$bar->printItem('baz'); // Выведет: 'Bar: baz'
$bar->printPHP();       // Выведет: 'PHP просто супер'

?>

<!-- https://www.php.net/manual/ru/language.oop5.inheritance.php -->
</body> 
</html>

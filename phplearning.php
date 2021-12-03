<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Объекты и ссылки</title>
</head>
<body>

<?php  //Пример #1 Ссылки и объекты
class A {
    public $foo = 1;
}

$a=new A;
$b = $a;// $a и $b - копии одного идентификатора
             // ($a) = ($b) = <id>
$b->foo = 2;
echo $a->foo. "\n";

$c = new A;
$d = &$c; // $c и $d - ссылки
             // ($c,$d) = <id>

$d->foo = 2;
echo $c->foo. "\n";

$e = new A;

function foo($obj){
        // ($obj) = ($e) = <id>
    $obj->foo = 2;
}

foo($e);
echo $e->foo. "\n";
?>


<!-- https://www.php.net/manual/ru/language.oop5.references.php -->
</body> 
</html>

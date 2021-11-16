<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Переменные переменных</title>
</head>
<body>
<?php  
$a = 'hello';
?>

<?php  
$$a = 'world';
?>

<!-- 2 варианта выводят один результат: -->

<!-- 1.если вы напишете $$a[1], обработчику необходимо знать, хотите ли вы использовать $a[1] в качестве переменной -->

<?php  
echo "$a ${$a}";//${$a[1]}
?>


<!-- 2.либо вам нужна как переменная $$a, а затем её индекс [1] -->
<?php
echo "$a $hello";//${$a}[1]
?>





<!-- Пример #1 Пример переменного имени свойства -->
<?php  
class foo{
    var $bar = 'I am bar.';
    var $arr = array('I am A.', 'I am B.', 'I am C.');
    var $r = 'I am r.';
}

$foo = new foo();
$bar = 'bar';
$baz = array('foo', 'bar', 'baz', 'quux');
echo $foo->$bar . "\n";
echo $foo->{$baz[1]} . "\n";

$start = 'b';
$end = 'ar';
echo $foo->{$start . $end} . "\n";

$arr = 'arr';
echo $foo->{$arr[1]} . "\n";
?>

<!-- https://www.php.net/manual/ru/language.variables.variable.php -->
</body>
</html>

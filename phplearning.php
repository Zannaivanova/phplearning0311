<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Scope(Область видимости переменной)</title>
</head>
<body>
<?php  
$a = 1;
include 'b.inc';
?>


<?php
$a = 1; /* глобальная область видимости */

function test()
{
    echo $a = 2; /* ссылка на переменную в локальной области видимости */
}

test();
?>

<!-- Пример #1 Использование global -->
<?php 
$a = 1;
$b = 2;

function Sum(){
	global $a, $b;
	$b = $a+$b;
}

Sum();
echo $b;
?>

<!-- Пример #2 Использование $GLOBALS вместо global -->
<?php  
$a = 1;
$b = 2;

function Sum(){
	$GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
}

Sum();
echo $b;
?>

<!-- Пример #3 Суперглобальные переменные и область видимости -->
<?php  
function test_superglobal(){
echo $_POST['name'];
}
?>


<!-- Пример #4 Демонстрация необходимости статических переменных -->
<?php  
function tets(){
$a = 0;
echo $a;
$a++;
}
?>

<!-- Пример #5 Пример использования статических переменных -->
<?php 
function test(){
	static $a = 0;
	echo $a;
	$a++;
}
?>

<!-- Пример #6 Статические переменные и рекурсивные функции -->
<?php
function test(){
	static $count = 0;

	$count++;
	echo $count;
	if ($count<10){
		test();
	}
	$count--;
  ?>
}

<!-- Пример #7 Объявление статических переменных -->

<?php
function foo() {
    static $int = 0;          // верно
    static $int = 1+2;        // верно
    static $int = sqrt(121);  // неверно (поскольку это функция)

    $int++;
    echo $int;
}
?>


<!-- Ссылки с глобальными (global) и статическими (static) переменными  -->

<?php
function test_global_ref() {
    global $obj;
    $new = new stdclass;
    $obj = &$new;
}

function test_global_noref() {
    global $obj;
    $new = new stdclass;
    $obj = $new;
}

test_global_ref();
var_dump($obj);
test_global_noref();
var_dump($obj);
?>


<?php
function &get_instance_ref() {
    static $obj;

    echo 'Статический объект: ';
    var_dump($obj);
    if (!isset($obj)) {
        $new = new stdclass;
        // Присвоить ссылку статической переменной
        $obj = &$new;
    }
    if (!isset($obj->property)) {
        $obj->property = 1;
    } else {
        $obj->property++;
    }
    return $obj;
}

function &get_instance_noref() {
    static $obj;

    echo 'Статический объект: ';
    var_dump($obj);
    if (!isset($obj)) {
        $new = new stdclass;
        // Присвоить объект статической переменной
        $obj = $new;
    }
    if (!isset($obj->property)) {
        $obj->property = 1;
    } else {
        $obj->property++;
    }
    return $obj;
}

$obj1 = get_instance_ref();
$still_obj1 = get_instance_ref();
echo "\n";
$obj2 = get_instance_noref();
$still_obj2 = get_instance_noref();
?>

<!-- https://www.php.net/manual/ru/language.variables.scope.php-->
</body>
</html>

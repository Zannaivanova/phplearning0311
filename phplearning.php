<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Veriables(переменные)</title>
</head>
<body>
<?php  
$var = 'Боб';
$Var = 'Джо';

echo "$var, $Var";
?>

<?php  
$foo = 'Боб';
$bar = &$foo;
$bar = "Меня зовут $bar";

echo $bar;
echo $foo;
?>

<!-- Пример #1 Значения по умолчанию в неинициализированных переменных -->
<?php 
// Неустановленная И не имеющая ссылок (то есть без контекста использования) переменная; выведет NULL
var_dump($unset_var);



// Булевое применение; выведет 'false' (Подробнее по этому синтаксису смотрите раздел о тернарном операторе)
echo($unset_bool ? "true\n": "false\n");

// Строковое использование; выведет 'string(3) "abc"'
$unset_str .='abc';
var_dump($unset_str);


// Целочисленное использование; выведет 'int(25)'
$unset_int +=25;
var_dump($unset_int);															

// Использование в качестве числа с плавающей точкой (float/double); выведет 'float(1.25)'
$unset_float +=1.25;
var_dump($unset_float);								

// Использование в качестве массива; выведет array(1) {  [3]=>  string(3) "def" }
$unset_arr[3]='def';
var_dump($unset_arr);

// Использование в качестве объекта; создаёт новый объект stdClass (смотрите http://www.php.net/manual/ru/reserved.classes.php)
// Выведет: object(stdClass)#1 (1) {  ["foo"]=>  string(3) "bar" }
$unset_obj->foo = 'bar';
var_dump($unset_obj);


?>


<!-- https://www.php.net/manual/ru/language.variables.basics.php -->
</body>
</html>

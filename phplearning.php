<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Аргументы функции</title>
</head>
<body>
<?php  //Пример #1 Передача массива в функцию
function takes_array($input){
        echo "$input[0] + $input[1] = ", $input[0] +$input[1];
}
?>

<?php//Пример #2 Список аргументов функции с завершающей запятой
function takes_many_args(
$first_args,
$second_args,
$a_very_long_argument_name,
$arg_with_default = 5,
$again = 'a default string',)
{

}
?>


<?php //Пример #3 Передача необязательных аргументов после обязательных аргументов

function foo($a = [], $b){}// Раньше
function foo($a, $b){} // Теперь

function bar(A $a = null, $b){} // Все ещё разрешено
function bar(?A $a, $b){}     // Рекомендуется
?>


<?php//Пример #4 Передача аргументов по ссылке  
function add_some_extra(&$string){
        $str .= 'и кое-что еще';
}
$str = 'Это строка, ';
add_some_extra($str);
echo $str;
?>

<?php //Пример #5 Использование значений по умолчанию в определении функции
 function makecofee ($type = "капучино"){
        return "Готовим чащку $type.\n";
 }
 echo makecofee();
 echo makecofee(null);
 echo makecofee("эспрессо");
?>

<?php  //Пример #7 Некорректное использование значений по умолчанию
function makeyogurt($type = "ацидофилл", $flavour){
        return "готовим чащку из бактерий $type со вкусои $flavour.\n";
}
echo makeyogurt("малины");// отрабатывает не правильно
?>

<?php  //Пример #8 Корректное использование значений по умолчанию
function makeyougurt($flavour, $type = "ацидофил"){
        return "нотовим чащку из бактерий $type со вкусом $flavour.\n";
}
echo makeyougurt("малины");// отрабатывает правильно
?>


<?php //Пример #9 Использование ... для доступа к аргументам
function sum (...$numbers){
        $acc = 0;
        foreach ($numbers as $n){
                $acc += $n;
        }
return $acc;
}
echo sum(1,2,3,4);
?>


<?php //Пример #10 Использование ... для передачи аргументов
function add($a, $b){
return $a +$b;
}
echo add(...[1,2])."\n";

$a = [1,2];
echo add(...$a);
 ?>


<?php//Пример #11 Аргументы с подсказкой типа
function total_intervals($unit, DateInterval ...$intervals){
        $time = 0;
        foreach ($intervals as $interval){
                $time +=$interval ->$unit;
        }
        return $time;
} 

$a = new DateInterval('P1D');
$b = new DateInterval('P2D');
echo total_intervals('d', $a, $b).'days';

// Это не сработает, т.к. null не является объектом DateInterval.
echo total_intervals('d', null);
 ?>


<?php  //Пример #12 Доступ к аргументам в предыдущих версиях PHP
function sum(){
        $acc = 0;
        foreach (func_get_args() as $n){
                $acc +=$n;
        }
        return $acc;
}

echo sum(1,2,3,4);
?>


<?php  //Пример #13 Синтаксис именованного аргумента
myFunction(paramName: $value);
array_foobar(array: $value);

// НЕ поддерживается.
function_name($variableStoringParamName: $value);
?>

<?php //Пример #14 Позиционные аргументы в сравнении с именованными аргументами
// Использование позиционных аргументов:
array_fill(0, 100, 50);

// Использование именованных аргументов:
array_fill(start_index:0, count: 100, value:50);
 ?>


 <?php  //Пример #15 Тот же пример, что и выше, но с другим порядком параметров
 array_fill(value:50, count:100, start_index:0);
?>


<?php  //Пример #16 Объединение именованных аргументов с позиционными аргументами
htmlspecialchars($string, double_encode:false);
// То же самое
htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, 'UTF-8', false);
?>



<?php //Пример #17 Выбрасывание исключения Error при передаче одного и того же параметра несколько раз

function foo($param) { ... }

foo(param:1, param: 2);
foo(1, param:2);
?>



<!-- https://www.php.net/manual/ru/functions.arguments.php -->
</body> 
</html>

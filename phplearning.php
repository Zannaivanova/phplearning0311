<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Операторы</title>
</head>
<body>
        <!-- Приоритет оператора -->
<?php  
$instance = new SimpleClass();

$className = 'SimpleClass';
$instance = new $className();
?>

<?php  
$a & $b == true;//сначала проверяет на равенство, затем побитовые
($a & $b) == true;//наоботрот
?>

        <!-- Арифметические операторы -->
<?php  
var_dump(intdiv(3,2));
var_dump(intdiv(-3,2));
var_dump(intdiv(3,-2));
var_dump(intdiv(-3,-2));
var_dump(intdiv(PHP_INT_MAX,PHP_INT_MAX));
var_dump(intdiv(PHP_INT_MIN,PHP_INT_MIN));
var_dump(intdiv(PHP_INT_MIN,-1));
var_dump(intdiv(1,0));
?>


        <!-- Оператор присваивания -->
<?php  
$a = 3;
$b = &$a;//по ссылке

print "$a\n";
print "$b\n";

$a = 4;

print "$a\n";
print "$b\n";

?>


        <!-- Побитовые операторы -->
<?php  

$format = '(%1$2d = %1$04b) = (%2$2d = %2$04b)'
        . ' %3$s (%4$2d = %4$04b)' . "\n";

echo <<<EOH
 ----------   ----------- -- ----------
 результат      значение      оп тест
 ----------   ----------- -- ----------
EOH;

$values = array(0,1,2,4,8);
$test = 1+4;

echo "\n Побитовое И (AND)\n";
foreach ($values as $value) {
    $result = $value & $test;
    printf($format, $result, $value, '&', $test);
}

echo "\n Побитовое (включающее) ИЛИ (OR) \n";
foreach ($values as $value) {
    $result = $value | $test;
    printf($format, $result, $value, '|', $test);
}

echo "\n Побитовое ИСКЛЮЧАЮЩЕЕ ИЛИ (XOR) \n";
foreach ($values as $value) {
    $result = $value ^ $test;
    printf($format, $result, $value, '^', $test);
}
?>


        <!-- Операторы сравнения -->
<?php

// Целые числа
echo 1 <=> 1; // 0
echo 1 <=> 2; // -1
echo 2 <=> 1; // 1

// Числа с плавающей точкой
echo 1.5 <=> 1.5; // 0
echo 1.5 <=> 2.5; // -1
echo 2.5 <=> 1.5; // 1

// Строки
echo "a" <=> "a"; // 0
echo "a" <=> "b"; // -1
echo "b" <=> "a"; // 1

echo "a" <=> "aa"; // -1
echo "zz" <=> "aa"; // 1

// Массивы
echo [] <=> []; // 0
echo [1, 2, 3] <=> [1, 2, 3]; // 0
echo [1, 2, 3] <=> []; // 1
echo [1, 2, 3] <=> [1, 2, 1]; // 1
echo [1, 2, 3] <=> [1, 2, 4]; // -1

// Объекты
$a = (object) ["a" => "b"];
$b = (object) ["a" => "b"];
echo $a <=> $b; // 0

$a = (object) ["a" => "b"];
$b = (object) ["a" => "c"];
echo $a <=> $b; // -1

$a = (object) ["a" => "c"];
$b = (object) ["a" => "b"];
echo $a <=> $b; // 1

// сравниваются не только значения; ключи также должны совпадать
$a = (object) ["a" => "b"];
$b = (object) ["b" => "b"];
echo $a <=> $b; // 1

?>

<?php  
function standart_array_compare($op1, $op2){
    if (count($op1)< count($op2)){
        return -1;
    } elseif (count($op1)>count($op2)){
        return 1;
    }

    foreach ($op1 as $key => $val){
        if(!array_key_exists($key, $op2)){
            return null;
        } elseif ($val < $op2[$key]){
            return -1;
        } elseif ($val > $op2[$key]){
            return 1;
        }
    }
    return 0;
}
?>   


        <!-- Оператор управления ошибками -->

<?php
// Преднамеренная ошибка при работе с файлами
$my_file = @file ('non_existent_file') or
    die ("Ошибка при открытии файла: сообщение об ошибке было таким: '" . error_get_last()['message'] . "'");

// работает для любых выражений, а не только для функций
$value = @$cache[$key];
// В случае если ключа $key нет, сообщение об ошибке (notice) не будет отображено

?>




<!-- https://www.php.net/manual/ru/language.operators.comparison.php#language.operators.comparison.coalesce -->
</body> 
</html>

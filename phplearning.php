<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обработка и логирование ошибок</title>    
</head>
<body>

    <?php //Пример #1 Обработка ошибок в скрипте

    error_reporting(0);

    function userErrorHandler($errno, $errmsg, $filename, $linenum, $vars){
        $dt = date("Y-m-d H:i:s (T)");

        $errortype = array (
            E_ERROR =>'ошибка',
            E_WARNING =>'предупреждение',
            E_PARSE =>'ощибка разбора исходного кода',
            E_NOTICE =>'уведосление',
            E_CORE_ERROR =>'ошибка ядра',
            E_CORE_WARNING =>'предупреждение ядра',
            E_COMPILE_ERROR =>'ошибка на этапе компеляции',
            E_COMPILE_WARNING =>'предупреждение на этапе компеляции',
            E_USER_ERROR =>'пользовательское предупреждение',
            E_USER_NOTICE=>'пользовательское уведомление',
            E_STRICT =>'уведомление времени выполнения',
            E_RECOVERABLE_ERROR =>'отлавливаемая фатальная ошибка' );

        $user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);

        $err = "<errorentry>";
        $err .="\t<datetime>". $dt ."</datetime>";
        $err .="\t<errornum>". $errno ."</errornum>";
        $err .="\t<errortype>". $errortype[$errno] ."</errortype>";
        $err .="\t<errormsg>" .$errmsg . "</errormsg>";
        $err .="\t<scriptname>". $filename . "</scriptname>";
        $err .="\t<scriptlinenum>" .$linenum ."</scriptlinenum>";

        if (in_array($errno, $user_errors)) {
            $err .="\t<vartrace>" .wddx_serialize_value($vars, "переменные"). "</vartrace>";
        } 
        $err .="</errorentry>";
ая 
        errorlog($err, 3, "/usr/local/php4/error.log");
        if ($errno == E_USER_ERROR) {
            mail("phpdev@example.com", "пользовательская критическая ошибка", $err);
        }
    }


function distance($vect1, $vect2){
    if(!is_array($vect1)|| !is_array($vect2)){
        triger_error("некоторые параметры функции, ожидаются массивы в качестве параметров", E_USER_ERROR);
        return NULL;
    }

    if (count($vect1) !=count($vect2)){
        trigger_error("векторы должны быть одинаковой размерности", E_USER_ERROR);
        retirn NULL;
    }

    for ($i=0; $i<count($vect1);  $i++){
        $c1 = $vect1[$i]; $c2 = $vect2[$i];
        $d = 0.0;
        if (!is_numeric($c1)){
            trigger_error("координата $i в векторе 1 не является числом, будет использовать Ноль", E_USER_WARNING );
            $c1 =0.0;
        }
        if (!is_numeric($c2)){
            trigger_error("координата $i в векторе 2 не является числом, будет использовать Ноль", E_USER_WARNING);
            $c2 = 0.0;
        }
        $d +=$c2*$c2 - $c1*$c1;
    }
    return sqrt($d);a
}

$old_error_handler = set_error_handler("userErrorHandler");

$t = I_AM_NOT_DEFINDED;

$a = array(2,3, "foo");
$b = array(5.5, 4.3, -1.6);
$c = array(1, -3);

$t1 = distance($c, $b) . ;
$t2 = distance($b, " я не массив") .;
$t3 = distance($a, $b) . ;

     ?>

<!-- Предопределённые константы:
    debug_backtrace — Выводит стек вызовов функций в массив -->
<?php //Пример #1 Пример использования debug_backtrace()
function a_test($str){
    echo "привет, $str";
    var_dump(debug_backtrace());
}

a_test('друг');

 ?>


    <!-- debug_print_backtrace — Выводит стек вызовов функций -->
 <?php 
function a(){
    b();
}

function b(){
    c();
}

function c(){
    debug_print_backtrace();
}

a();
  ?>


    <!-- error_clear_last — Очистить самую последнюю ошибку -->
<?php //Пример #1 Пример error_clear_last()
var_dump(error_get_last());
error_clear_last();
var_dump(error_get_last());

@$a = $b;

var_dump(error_get_last());
error_clear_last();
var_dump(error_get_last());

 ?>

   <!--  error_get_last — Получение информации о последней произошедшей ошибке -->
<?php //Пример #1 Пример использования error_get_last()
echo $a;
print_e(error_get_last());

 ?>

 <!--    error_log — Отправляет сообщение об ошибке заданному обработчику ошибок -->
<?php //Пример #1 Примеры использования error_log()
if (!Ora_logon($username, $password)){
    error_log("база данных Oracle недоступна", 0);
}

if (!($foo = allocate_new_foo())){
    error_log("больщая проблема, мф выпали из Foo", 1, 
"operator@example.com");
}
 error_log("вы ошиблись", 3, "/var/tmp/my-errors.log" );
 ?>

    <!-- error_reporting — Задаёт, какие ошибки PHP попадут в отчёт -->
<?php //Пример #1 Примеры использования error_reporting()

// Выключение протоколирования ошибок
error_reporting(0);

// Включать в отчёт простые описания ошибок
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Включать в отчёт E_NOTICE сообщения (добавятся сообщения о
// непроинициализированных переменных или ошибках в именах переменных)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Добавлять сообщения обо всех ошибках, кроме E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

// Добавлять в отчёт все ошибки PHP
error_reporting(E_ALL);

// Добавлять в отчёт все ошибки PHP
error_reporting(-1);

// То же, что и error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

 ?>

    <!-- restore_error_handler — Восстанавливает предыдущий обработчик ошибок -->
<?php //Пример #1 Пример использования restore_error_handler()
function unserialize_handler($errno, $errstr)
{
    echo "Сериализуемое значение недопустимо.\n";
}

$serialized = 'foo';
set_error_handler('unserialize_handler');
$original = unserialize($serialized);
restore_error_handler();

 ?>

   <!--  restore_exception_handler — Восстанавливает предыдущий обработчик исключений -->

   <?php//Пример #1 Пример использования restore_exception_handler() 
   function exception_handler_1(Exception $e)
    {
        echo '[' . __FUNCTION__ . '] ' . $e->getMessage();
    }

    function exception_handler_2(Exception $e)
    {
        echo '[' . __FUNCTION__ . '] ' . $e->getMessage();
    }

    set_exception_handler('exception_handler_1');
    set_exception_handler('exception_handler_2');

    restore_exception_handler();

    throw new Exception('Вызван первый обработчик исключений...'); 

    ?>


    <!-- set_error_handler — Задаёт пользовательский обработчик ошибок -->
<?php //Пример #1 Обработка ошибок с помощью функций set_error_handler() и trigger_error() 

// функция обработки ошибок
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        // Этот код ошибки не включён в error_reporting,
        // так что пусть обрабатываются стандартным обработчиком ошибок PHP
        return false;
    }

    // может потребоваться экранирование $errstr:
    $errstr = htmlspecialchars($errstr);

    switch ($errno) {
    case E_USER_ERROR:
        echo "<b>Пользовательская ОШИБКА</b> [$errno] $errstr<br />\n";
        echo "  Фатальная ошибка в строке $errline файла $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Завершение работы...<br />\n";
        exit(1);

    case E_USER_WARNING:
        echo "<b>Пользовательское ПРЕДУПРЕЖДЕНИЕ</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>Пользовательское УВЕДОМЛЕНИЕ</b> [$errno] $errstr<br />\n";
        break;

    default:
        echo "Неизвестная ошибка: [$errno] $errstr<br />\n";
        break;
    }

    /* Не запускаем внутренний обработчик ошибок PHP */
    return true;
}

// функция для тестирования обработчика ошибок
function scale_by_log($vect, $scale)
{
    if (!is_numeric($scale) || $scale <= 0) {
        trigger_error("log(x) для x <= 0 не определён, вы используете: scale = $scale", E_USER_ERROR);
    }

    if (!is_array($vect)) {
        trigger_error("Некорректный входной вектор, пропущен массив значений", E_USER_WARNING);
        return null;
    }

    $temp = array();
    foreach($vect as $pos => $value) {
        if (!is_numeric($value)) {
            trigger_error("Значение на позиции $pos не является числом, будет использован 0 (ноль)", E_USER_NOTICE);
            $value = 0;
        }
        $temp[$pos] = log($scale) * $value;
    }

    return $temp;
}

// переключаемся на пользовательский обработчик
$old_error_handler = set_error_handler("myErrorHandler");

// вызовем несколько ошибок, во-первых, определим массив с нечисловым элементом
echo "vector a\n";
$a = array(2, 3, "foo", 5.5, 43.3, 21.11);
print_r($a);

// теперь создадим ещё один массив
echo "----\nvector b - a notice (b = log(PI) * a)\n";
/* Значение на позиции $pos не является числом, будет использован 0 (ноль)*/
$b = scale_by_log($a, M_PI);
print_r($b);

// проблема, мы передаём строку вместо массива
echo "----\nvector c - a warning\n";
/* Некорректный входной вектор, пропущен массив значений */
$c = scale_by_log("not array", 2.3);
var_dump($c); // NULL

// критическая ошибка, логарифм от неположительного числа не определён
echo "----\nvector d - fatal error\n";
/* log(x) для x <= 0 не определён, вы используете: scale = $scale */
$d = scale_by_log($a, -2.5);
var_dump($d); // До сюда не дойдём никогда
 ?>

  <!--   set_exception_handler — Задаёт пользовательский обработчик исключений -->
<?php//Пример #1 Пример использования set_exception_handler() 
function exception_handler($exception) {
  echo "Неперехваченное исключение: " , $exception->getMessage(), "\n";
}

set_exception_handler('exception_handler');

throw new Exception('Неперехваченное исключение');
echo "Не выполнено\n"; 

 ?>

   <!--  trigger_error — Вызывает пользовательскую ошибку/предупреждение/уведомление -->
<?php//Пример #1 Пример использования trigger_error()
if ($divisor == 0) {
    trigger_error("Не могу поделить на ноль", E_USER_ERROR);
} 

 ?>


    <!-- user_error — Псевдоним trigger_error -->



<!-- https://www.php.net/manual/ru/book.errorfunc.php -->
</body> 
</html>





























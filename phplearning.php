<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>runkit7</title>    
</head>
<body>

<!-- Функции runkit7 -->

    <!-- runkit7_constant_add — Аналогичен define(), но также позволяет определить константу класса -->


    <!-- runkit7_constant_redefine — Переопределяет уже определённую константу -->
    <!-- runkit7_constant_remove — Удаляет уже определённую константу -->

    <!-- runkit7_function_add — Добавляет новую функцию, функция аналогична create_function -->

<?php //Пример #1 Пример использования runkit7_function_add()
runkit7_function_add('testme','$a,$b','echo "Значение A - $a\n"; echo "Значение B - $b\n";');
testme(1,2);
 ?>


    <!-- runkit7_function_copy — Копирует функцию в новое имя функции -->
<?php //Пример #1 Пример использования runkit7_function_copy()
function original(){
    echo "В функции";
}

runkit7_function_copy('original', 'duplicate');
original();
duplicate();
 ?>

    <!-- runkit7_function_redefine — Заменяет определение функции новой реализацией -->

<?php //Пример #1 Пример использования runkit7_function_redefine()
function testme(){
    echo "Оригинальная реализация Testme";
}
testme();
runlit7_function_redefine('testme', 'echo "Новая реализация Testme";');
testme();
 ?>


    <!-- runkit7_function_remove — Удаляет определение функции -->
    <!-- runkit7_function_rename — Изменяет имя функции -->
    <!-- runkit7_import — Обрабатывает функцию импорта файла PHP и определения классов, при необходимости перезаписывая -->

    <!-- runkit7_method_add — Динамически добавляет новый метод в заданный класс -->
<?php//Пример #1 Пример использования runkit7_method_add()
class Example {
    function foo(){
        echo "foo";
    }
}

$e = new Example();

runkit7_method_add(
'Example',
'add',
'$num1, $num2',
'return $num1 +$num2;',
RUNKIT7_ACC_PUBLIC);

echo $e->add(12, 4);
  ?>

    <!-- runkit7_method_copy — Копирует метод из одного класса в другой -->
<?php //Пример #1 Пример использования runkit7_method_copy()
class Foo{
    function example(){
        return "foo";
    }
}

class Bar{

}

runkit7_method_copy('Bar', 'baz', 'Foo', 'example');

echo Bar::baz();
 ?>

    <!-- runkit7_method_redefine — Динамически изменяет код заданного метода -->
<?php //Пример #1 Пример использования runkit7_method_redefine()
class Example{
    function foo(){
        return "foo";
    }
}

$e = new Example();

echo "До: ". $e->foo();

runkit7_method_redifine(
'Example',
'foo',
'',
'return "bar";',
RUNKIT7_ACC_PUBLIC);

echo "После: ". $e->foo();
 ?>

    <!-- runkit7_method_remove — Динамически удаляет заданный метод -->
<?php //Пример #1 Пример использования runkit7_method_remove()
class Example {
    function foo(){
        return "foo";
    }

function bar(){
    return "bar";
}
}

rynkit7_method_remove(
'Example',
'foo');

echo implode('', get_class_methods('Example'));
 ?>

    <!-- runkit7_method_rename — Динамически изменяет имя заданного метода -->
<?php //Пример #1 Пример использования runkit7_method_rename()
class Example {
    function foo(){
        return "foo";
    }
}

runkit7_method_rename(
'Example',
'foo',
'bar');

echo (new Example)->bar();
 ?>

    <!-- runkit7_object_id — Возвращает дескриптор целочисленного объекта для данного объекта -->
    <!-- runkit7_superglobals — Возвращает числовой индексированный массив зарегистрированных суперглобальных переменных -->
    <!-- runkit7_zval_inspect — Возвращает информацию о переданном значении с типами данных, количеством ссылок и так далее -->

<?php //Пример #1 Пример использования runkit7_zval_inspect()
$var = new DateTime();
var_dump(runkit7_zval_inspect($var));

$var = 1;
var_dump(runkit7_zval_inspect($var));
 ?>

<!-- https://www.php.net/manual/ru/book.runkit7.php -->
</body> 
</html>





























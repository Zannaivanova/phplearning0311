<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Operations для Zend</title>    
</head>
<body>
    <!-- uopz_add_function — Добавляет несуществующую функцию или метод -->
<?php //Пример #1 Простое использование uopz_add_function()
uopz_add_function('foo', function(){ echo 'bar';});
foo();
 ?>
    <!-- uopz_allow_exit — Позволяет управлять отключённым опкодом exit -->
<?php //Пример #1 Пример использования uopz_allow_exit()
exit(1);
echo 1;
uopz_allow_exit(true);
exit(2);
echo
 ?>
    <!-- uopz_backup — Резервирует функцию -->
    <!-- uopz_compose — Составить класс -->
    <!-- uopz_copy — Скопировать функцию -->
    <!-- uopz_del_function — Удаляет ранее добавленную функцию или метод -->
<?php //Пример #1 Простое использование uopz_del_function()
uopz_zdd_function('foo', function() {echo 'bar';});
var_dump(function_exists('foo'));
uopz_del_function('foo');
var_dump(function_exists('foo'));
 ?>

    <!-- uopz_delete — Удалить функцию -->
    <!-- uopz_extend — Расширить класс во время выполнения -->
<?php //Пример #1 Пример использования uopz_extend()
class A {}
class B {}

uopz_extend(A::class, B::class);

var_dump(class_parents(A::class));
 ?>

    <!-- uopz_flags — Получить или установить флаги для функции или класса -->
<?php //Пример #1 Пример использования uopz_flags()
class Test{
    public function method(){
        return __CLASS__;
    }
}

$flags = uopz_flags("Test", "method");

var_dump((bool)(uopz_flags("Test", "method")& ZEND_ACC_PRIVATE));
var_dump((bool)(uopz_flags("Test", "method")& ZEND_ACC_STATIC));

var_dump(uopz_flags("Test", "method", $flags|ZEND_ACC_STATIC|ZEND_ACC_PRIVATE));

var_dump((bool)(uopz_flags("Test", "method")&ZEND_ACC_PRIVATE));
var_dump((bool)(uopz_flags("Test", "method")& ZEND_ACC_STATIC));
 ?>

    <!-- uopz_function — Создаёт функцию во время выполнения -->
    <!-- uopz_get_exit_status — Получить последний установленный статус выхода -->
<?php //Пример #1 Пример использования uopz_get_exit_status()
exit(123);
echo uopz_get_exit_status();
 ?>

    <!-- uopz_get_hook — Получает ранее установленный обработчик на функцию или метод -->
<?php //Пример #1 Простое использование uopz_get_hook()
function foo(){
    echo 'foo';
}
uopz_set_hook('foo', function() {echo 'bar';});
var_dump(uopz_get_hook('foo'));
 ?>

    <!-- uopz_get_mock — Получить текущий имитатор (mock) для класса -->
<?php //Пример #1 Пример использования uopz_get_mock()
calss A {
    public static function who(){
        echo "A";
    }
}

class mockA {
    public static function who(){
        echo "mockA";
    }
}

uopz_set_mock(A::class, mockA::class);
echo uopz_get_mock(A::class);
 ?>


    <!-- uopz_get_property — Получает значение класса или свойство экземпляра -->
<?php //Пример #1 Простое использование uopz_get_property()
class Foo{
    private static $staticBar = 10;
    private $bar = 100;
}

$foo = new Foo;
var_dump(uopz_get_property('Foo', 'staticBar'));
var_dump(uopz_get_property($foo, 'bar'));
 ?>

    <!-- uopz_get_return — Получает предыдущее установленное возвращаемое значение для функции -->
<?php //Пример #1 Пример использования uopz_get_return()
uopz_set_return("strlen", 42);
echo uopz_set_return("strlen");
 ?>

    <!-- uopz_get_static — Возвращает статические переменные из области видимости функции или метода -->
<?php //Пример #1 Пример использования uopz_get_return()
function foo(){
    static $bar = 'baz';
}
var_dump(uopz_get_static('foo'));
 ?>

    <!-- uopz_implement — Реализует интерфейс во время выполнения -->
<?php //Пример #1 Пример использования uopz_implement()
interface myInterface {}

class myClass {}

uopz_implement(myClass::class, myInterface::class);

var_dump(class_implements(myClass::class));
 ?>

    <!-- uopz_overload — Перегрузить опкод VM -->
    <!-- uopz_redefine — Переопределить константу -->
<?php //Пример #1 Пример использования uopz_redefine()
define("MY", 100);

uopz_redefine("MY", 1000);

echo MY;
 ?>

    <!-- uopz_rename — Переименовать функцию во время выполнения -->
    <!-- uopz_restore — Восстановить ранее зарезервированную функцию -->
    <!-- uopz_set_hook — Устанавливает обработчик для выполнения при вызове функции или метода -->
<?php //Пример #1 Простое использование uopz_set_hook()
function foo(){
    echo 'foo';
}
uopz_set_hook('foo', function (){echo 'bar';});
foo();
 ?>


    <!-- uopz_set_mock — Использовать имитатор вместо класса для новых объектов -->
<?php //Пример #1 Пример использования uopz_set_mock()
class A {
    public function who(){
        echo "A";
    }
}

class mockA {
    public function who(){
        echo "mockA";
    }
}

uopz_set_mock(A::class, mockA::class);
(new A)->who();
 ?>


<?php //Пример #2 Пример использования uopz_set_mock()
class A{
    public function who(){
        echo "A";
    }
}

uopz_set_mock(A::class, new class {
    public function who(){
        echo "mockA";
    }
});
(new A)-> who();
 ?>

 <?php //Пример #3 uopz_set_mock() и статические члены класса
class A {
    public static function who(){
        echo "A";
    }
}
uopz_set_mock(A::class, new class{
    const CON = 'mockA';
    public static function who(){
        echo "mockA";
    }
});
echo A::CON, PHP_EOL;
A::who();
  ?>


    <!-- uopz_set_property — Устанавливает значение существующего свойства класса или экземпляра -->

<?php //Пример #1 Простое использование uopz_set_property()
class FOO{
    private static $staticBar;
    private $bar;
    public static function testStaticBar(){
        return self::$staticBar;
    }
    public function testBar(){
        return $this->bar;
    }
}
$foo = new Foo;
uopz_set_property('Foo', 'staticBar', 10);
uopz_set_property($foo, 'bar', 100);
var_dump(Foo::testStaticBar());
var_dump($foo->testBar());
 ?>    
    

    <!-- uopz_set_return — Предоставить возвращаемое значение для существующей функции -->
<?php //Пример #1 Пример использования uopz_set_return()
uopz_set_return("strlen", 42);
echo strlen("Banana");
 ?>

<?php //Пример #2 Пример использования uopz_set_return()
uopz_set_return("strlen", function($str){return strlen($str)*2;}, true);
echo strlen("Banana");
 ?>


 <?php //Пример #3 Пример использования uopz_set_return() с классом
class My {
    public static function strlen($arg){
        return strlen($arg);
    }
}

uopz_set_return(My::class, "strlen", function($str){return strlen($str)*2;}, true);
echo My::strlen("Banana");
  ?>


    <!-- uopz_set_static — Устанавливает статические переменные в области видимости функции или метода -->
<?php //Пример #1 Простое использование uopz_set_static()
function foo(){
    static $bar = 'baz';
    var_dump($bar);
}
uopz_set_static('foo', ['bar'=>'qux']);
foo();
 ?>

    <!-- uopz_undefine — Отменяет определение константы -->
<?php //Пример #1 Пример использования uopz_undefine()
define("MY", true);

uopz_undefine("MY");

ver_damp(defined("MY"));
 ?>

    <!-- uopz_unset_hook — Удаляет ранее установленную функцию или метод -->
<?php //Пример #1 Простое использование uopz_unset_hook()
function foo(){
    echo 'foo';
}

uopz_set_hook('foo', function (){echo 'bar';});
foo();
echo PHP_EOL;
uopz_unset_hook('foo');
foo();
 ?>

    <!-- uopz_unset_mock — Удалить ранее установленный имитатор -->
<?php //Пример #1 Пример использования uopz_unset_mock()
class A{
    public static function who(){
        echo "A";
    }
}

class mockA {
    public static function who(){
        echo "mockA";
    }
}

uopz_set_mock(A::class, mockA::class);
uopz_unset_mock(A::class);
A::who();
 ?>


    <!-- uopz_unset_return — Отменяет ранее установленное возвращаемое значение для функции -->
<?php //Пример #1 Пример использования uopz_unset_return()
uopz_set_return("strlen", 42);
$len = strlen("Banana");
uopz_unset_return("strlen");
echo $len + strlen("Banana");
 ?>

<!-- https://www.php.net/manual/ru/book.uopz.php -->
</body> 
</html>





























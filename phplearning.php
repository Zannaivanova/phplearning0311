
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FAQ: вещи, которые вам необходимо знать о пространствах имён </title>
</head>
<body>

<?php  //Пример #1 Доступ к глобальным классам вне пространства имён
$a = new \stdClass;
?>

<?php  //Пример #2 Доступ к глобальным классам вне пространства имён
$a = new stdClass;
?>


<?php  //Пример #3 Доступ ко внутренним классам в пространствах имён
namespace foo;
$a = new \stdClass;

function test(\ArrayObject $parametr_type_example = null){}

$a = \DirectoryIterator::CURRENT_AS_FILEINFO;

class MyExeption extends \Exception {}
?>


<?php  //Пример #4 Доступ ко внутренним классам, функциям или константам в пространствах имён
namespace foo;

class MyClass {}

function test (MyClass $parameter_type_example = null){}
function test(\foo\MyClass $parameter_type_example = null){}

class Extended extends MyClass {}

$a = \globalfunc();

$b = \INI_ALL;
?>

<?php  //Пример #5 Абсолютные имена
namespace foo;
$a = new \my\name();
echo \strlen('hi');
$a = \INI_ALL;
?>


<?php //Пример #6 Полные имена
namespace foo;
use blah\blah as foo;

$a = new my\name();
foo\bar::name();
my\bar();
$a = my\BAR;
 ?>


<?php  //Пример #7 Неполные имена классов
namespace foo;
use blah\blah as foo;

$a = new name();
foo::name();
?>


<?php  //Пример #8 Неполные имена функций или констант
namespace foo;
use blah\blah as foo;

const FOO = 1;

function my( ){}
function foo() {}
function sort(&$a){
	\sort($a);
	$a = array_flip($a);
	return $a;
}

my();
$a = strlen('hi');
$arr = array(1,2,3);
$b = sort($arr);
$c = foo();

$a = FOO;
$b = INI_ALL;
?>


<?php  //Пример #9 Подводные камни при использовании имени пространства имён внутри строки с двойными кавычками
$a = "dangerous\name";
$obj = new $a;

$a = 'not\at\all\dangerous';
$obj = new $a;
?>



<?php  //Пример #10 Неопределённые константы
namespace bar;
$a = FOO;
$a = \FOO;
$a = Bar\FOO;
$a = \Bar\FOO;
?>



<?php //Пример #11 Неопределённые константы
namespace bar;
const NULL = 0;
const true = 'stupid';

 ?>

<!-- https://www.php.net/manual/ru/language.namespaces.faq.php -->
</body> 
</html>

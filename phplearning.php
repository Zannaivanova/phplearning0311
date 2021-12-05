
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование пространства имён: основы </title>
</head>
<body>
<?php 
namespace Foo\Bar\subnamespace;

const Foo = 1;
function foo(){}
 class foo {
    static function staticmethod(){
    }
 }
?>

<?php  
namespace Foo\Bar;
include 'file1.php';

const FOO = 2;
function foo(){}
class foo{
    static function staticmethod(){}
}

foo();
foo::staticmethod();
echo FOO;

subnamespace\foo();
subnamespace\foo::staticmethod();

echo subnamespace\FOO;
\FOO\Bar\foo();
\FOO\Bar\::staticmethod();
echo \FOO\Baar\Foo;
?>


<?php //Пример #1 Доступ к глобальным классам, функциям и константам из пространства имён 
namespace Foo;

function strlen(){}
    const INI_ALL = 3;
    class Exeption{
    }

    $a = \strlen(){}
    const INI_ALL = 3;
    class Exeption{}

    $a = \strlen('hi');
    $b = \INI_ALL;
    $c = new\Exeption('error');

?>



<!-- https://www.php.net/manual/ru/language.namespaces.basics.php -->
</body> 
</html>

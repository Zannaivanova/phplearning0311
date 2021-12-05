
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Пространства имён и динамические особенности языка </title>
</head>
<body>

    
<?php  //Пример #1 Динамически доступные элементы
class classneme{
    function __construct()
{
    echo __METHOD__. ;
}}

function funcname(){
    echo __FUNCTION__,
}

const cconstname = "global";

$a = 'classneme';
$obj = new $a;
$b = 'funcname';
$b();
echo constant('constant'),
?>

<?php  //Пример #2 Динамически доступные элементы пространства имён
namespace namespacename;
class classname{
    function __construct(){
        echo __METHOD__,
    }
}

function funcname(){
    echo __FUNCTION__,
}

const constname = "namespaced";

include 'example1.php';

$a = 'classname';
$obj = new $a;
$b = 'funcname';
$b();
echo constant('constname'),

$a = '\namespacename\classname';
$obj = new $a;
$a = 'namespacename\classname';
$obj = new $a;
$b = 'namespacename\funcname';
$b();
$b = 'namespacename\funcname';
$b();
echo constant('\namespacename\constname');
echo constant('namespacename\constname');
?>



<!-- https://www.php.net/manual/ru/language.namespaces.dynamic.php -->

</body> 
</html>

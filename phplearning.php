
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование пространств имён: импорт/создание псевдонима имени</title>
</head>
<body>

<?php //Пример #1 импорт/создание псевдонима имени с помощью оператора use
namespace foo;
use My\Full\Classname as Another;

use My\Full\NSame;

use ArrayObject;

use function My\Full\functionName;

use function My\Full\functionName as func;


use const My\Full\CONSTANT;

$obj = new namespace\Another;
$obj = new Another;
NSname\subns\func();
$a = new ArrayObject(array(1));

func();
echo CONSTANT;
 ?>


<?php  //Пример #2 импорт/создание псевдонима имени с помощью оператора use, комбинирование нескольких операторов use
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another;
NSname\subns\func();
?>


<?php //Пример #3 Импорт и динамические имена
use My\Full\
Classname as Another, My\Full\NSname;

$obj = new Another;
$a = 'Another';
$obj = new $a;
 ?>

<?php //Пример #4 Импортирование и абсолютные имена
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another;
$obj = new \Another;
$obj = new Another\thing;
$obj = new \Another\thing;
 ?>
 

 <?php  //Пример #4 Импортирование и абсолютные имена
 namespace Languages;

 function toGreenlandic(){
 	use Languages\Danish;
 }
 ?>

<?php  //Описание группирования в одном операторе use ¶
use some\namespace\ClassA;
use some\namespace\ClassB;
use some\namespace\ClassC as C;

use function some\namespace\fn_a;
use function some\namespace\fn_b;
use function some\namespace\fn_c;

use const some\namespace\ConstA;
use const some\namespace\ConstB;
use const some\namespace\ConstC;

use some\namespace\{ClassA, ClassB, ClassC as C};
use function some\namespace\{fn_a,fn_b,fn_c};
use const some\namespace\{ConstA, ConstB, ConstC};


?>


<!-- https://www.php.net/manual/ru/language.namespaces.importing.php -->
</body> 
</html>

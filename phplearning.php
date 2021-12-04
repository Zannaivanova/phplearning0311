<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Обзор пространств имён</title>
</head>
<body>

<?php//Пример #1 Пример синтаксиса, использующего пространство имён
namespace my\name;// смотрите раздел "Определение пространств имён"
class MyClass{}
function myfuncion(){}
const MYCONST = 1;

$a = new MyClass;
$c = new \my\name\MyClass;// смотрите раздел "Глобальная область видимости"

$a = strlen('hi');// смотрите раздел "Использование пространств имён: возврат
                   // к глобальной функции/константе"

$d = namespace\MYCONST;// смотрите раздел "оператор пространства имён и
                        // константа __NAMESPACE__"

$d = __NAMESPACE__ . '\MYCONST';

echo constant($d);// смотрите раздел "Пространства имён и динамические особенности языка"
?>


<!-- https://www.php.net/manual/ru/language.namespaces.rationale.php -->
</body> 
</html>

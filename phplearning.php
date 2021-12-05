
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ключевое слово namespace и константа __NAMESPACE__ </title>
</head>
<body>

<?php  //Пример #1 Пример использование константы __NAMESPACE__ в коде с пространством имён
namespace MyProject;

echo '"', __NAMESPACE__, '"';
?>


<?php //Пример #2 Пример использование константы __NAMESPACE__ в глобальном пространстве
echo '"', __NAMESPACE__, '"';
 ?>


 <?php  //Пример #3 использование константы __NAMESPACE__ для динамического конструирования имени
namespace MyProject;

function get($classname){
$a = __NAMESPACE__ . '\\' . $classname;
return new $a;
}
 ?>

 <?php  //Пример #4 Оператор namespace, внутри пространства имён
 namespace MyProject;

 use blah\blah as mine;

 blah\mine();
 namespace\blah\mine();

 namespace\func();
 namespace\sub\func();
 namespace\cname::method();
 $a = new namespace\sub\cname();
 $b = namespace\CONSTANT;
 ?>


<?php //Пример #5 Оператор namespace в глобальном коде
namespace\func();
namespace\sub\func();
namespace\cname::method();
$a = new namespace\sub\cname();
$b = namespace\CONSTANT;

 ?>

<!-- https://www.php.net/manual/ru/language.namespaces.nsconstants.php -->
</body> 
</html>

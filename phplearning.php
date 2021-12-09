
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование пространств имён: переход к глобальной функции/константе </title>
</head>
<body>
<?php //Пример #1 Доступ к глобальным классам внутри пространства имён
namespace A\B\C;
class Exeption extends \Exeption {}

$a = new Exeption('hi');
$b = new \Exeption('hi');

$c = new ArrayObject;
?>


<?php//Пример #2 Необходимость прибегнуть к глобальным функциям/константам внутри пространства имён

namespace A\B\C;

const E_ERROR = 45;
function strlen($str){
	return \strlen($strlen) -1;
} 


echo E_ERROR, "\n";
echo INI_ALL, "\n";

echo strlen('hi'), "\n";
if (is_array('hi')){
	echo "это массив \n";
}

 ?>

<!-- https://www.php.net/manual/ru/language.namespaces.fallback.php -->
</body> 
</html>

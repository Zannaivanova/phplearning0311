
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cсылки</title>
</head>
<body>

<?php  //Пример #1 Использование ссылок с неинициализированными переменными
function foo(&$var){}

foo($a);

$b = array();
foo($b['b']);
var_dump(array_key_exists('b', $b));

$c = new stdClass;
foo($c->d);
var_dump(property_exists($c, 'd'));
?>


<?php //Пример #2 Присвоение ссылок глобальным переменным внутри функции
$var1 = "Пример переменной";
$var2 = "";

function global_references($use_globals){
	global $var1, $var2;
if (!$use_globals){
	$var2 = &var1;
} else {
	$GLOBALS["var2"]=&$var1;
 }
}
 
global_references(false);
echo "значение var2: '$var2'\n";
global_references(true);
echo "значение var2: '$var2'\n";

 ?>



<?php  //Пример #3 Ссылки и foreach
$ref = 0;
$row = &ref;
foreach (array(1,2,3) as $row){

}

echo $ref;
?>

<?php  
$a = 1;
$b = array(2,3);
$arr = array(&$a, &$b[0], &$b[1]);
$arr[0]++; $arr[1]++; $arr[2]++;
?>


<?php  
$a = 1;
$b = &$a;
$c = $b;
$c = 7;

$arr = array(1);
$a = &$arr[0];
$arr2 = $arr;
$arr2[0]++;
?>


<?php  //Передача по ссылке 
function foo(&$var){
	$var++;
}

$a = 5;
foo($a);
?>


<?php //ссылки не являются указателями
function foo(&$var){
	$var = & $GLOBALS["baz"];
}

foo($bar);
 ?>

 
 <?php//Передача по ссылке
 function foo(&$var){
 	$var++;
 }  

 $a = 5;
 foo($a);
 ?>

<?php  
function foo(&$var){
	$var++;
}

function &bar(){
	$a = 5;
	return $a;
}
foo(bar());
?>


<?php //Возврат по ссылке
class foo{
	public $value = 42;

	public function &getValue(){
		return $this->value;
	}
}

$obj = new foo;
$myValue = &$obj->getValue();
$obj->value = 2;
echo $myValue;
 ?>


 <?php  
 function &collector(){
 	static $collection = array(;
 		return $collection;)
 }

 $collection = &collector();
 $collection[] = 'foo';
 ?>


 <?php 
 function &collector(){
 	static $colle tion = array();
 	return $collection;
 }

 array_push(collector(), 'foo');
  ?>


<?php  //Сброс переменных-ссылок
$a = 1;
$b = &a;
unset($a);
?>


<?php //Ссылки global 
$var = &$GLOBALS["var"];
?>

<!-- https://www.php.net/manual/ru/language.references.php -->
</body> 
</html>






























<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Чтение атрибутов с помощью Reflection API</title>
</head>
<body>

<?php //Пример #1 Чтение атрибутов с помощью Reflection API
#[Attribute]

class NMyAttribute{
  public $value;

  public function __construct($value){
  	$this->value = $value;
  }
}

#[MyAttribute(value:1234)]
class thing{
}

function dumpAttributeData($reflection){
	$attributes = $reflection->getAttributes();

	foreach ($attributes as $attribute){
		var_dump($attribute->getName());
		var_dump($attribute->getArguments());
		var_dump($attribute->newIstance());
	}
}


dumAttributeDatas(new ReflectionClass(Thing::class));
/*
string(11) "MyAttribute"
array(1) {
  ["value"]=>
  int(1234)
}
object(MyAttribute)#3 (1) {
  ["value"]=>
  int(1234)
}
*/
 ?>


<?php  //Пример #2 Чтение конкретных атрибутов с помощью Reflection API
function dumpMyAttributeData($reflection){
	$attributes = $reflection->getAttributes(MyAttribute::class);

	foreach ($attributes as $attribute){
		var_dump($attribute->getName());
		var_dump($attribute->getArguments());
		var_dump($attribute->newIstance());
	}
}

dumpMyAttributeData(new ReflectionClass(Thing::class));
?>

<!-- https://www.php.net/manual/ru/language.attributes.syntax.php -->
</body> 
</html>





























<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Конструкторы и деструкторы</title>
</head>
<body>

<?php  //Пример #1 Конструкторы при наследовании
class BaseClass {
	function __construct(){
		print "Конструктор класса BaseClass\n";
	}
}

class SubClass extends BaseClass {
	function __construct(){
		parent:: __construct();
		print "Конструктор класса SunClass\n";
	}
}

class OtherSubClass extends BaseClass {    // наследует конструктор BaseClass
}

$obj = new BaseClass();// Конструктор класса BaseClass

// Конструктор класса BaseClass
// Конструктор класса SubClass
$obj = new SubClass();

$obj = new OthewrSubClass();// Конструктор класса BaseClass
?>



<?php  //Пример #2 Использование аргументов в конструкторах
class Point {
	protected int $x;
	protected int $y;

    public function __construct(int $x, int $y = 0){
    	$this->x = $x;
    	$this->y = $y;
    }
}

$p1 = new Point(4, 5);// Передаём оба параметра.

$p2 = new Point(4);// Передаём оба параметра.

$p3 = new Point(y: 5, x:4);// Вызываем с именованными параметрами (начиная с PHP 8.0)
?>

<?php //Пример #3 Использование определения свойств в конструкторе
class Point {
	public function __construct(protected int $x, protected int $y = 0){ }
}	
 ?>

<?php //Пример #4 Использование статических методов для создания объектов
class Product {
	private ?int $id;
	private ?string $name;

	private function __construct(?int $id = null, ?string $name = null){
		$this->id = $id;
		$this->name = $name;
	}

	public static function fromBasicData(int $id, string $name): static{
		$new = new static($id, $name);
		return $new;
	}

	public static function fromJson(string $json): static {
		$data = json_decode($json);
		return new static($data['id'], $data['name']);
	}

	public static function fromXml(string $xml): static{// Пользовательская логика.
		$data = convert_xml_to_array($xml);
		$new = new static();
		$new->id = $data['id'];
		$new->name = $data['name'];
		return $new;
	}
}

$p1 = Product::fromBasicData(5, 'Widget');
$p2 = Product::fromJson($some_json_string);
$p3 = Product::fromXml($some_xml_string);
?>


<?php//Пример #5 Пример использования деструктора

class MyDestructableClass{
	function __construct(){
		print "Конструктор \n";
	}

	function __destruct(){
		print"Уничтожается" . __CLASS__ . "\n";
	}
} 

$obj = new MyDestructableClass(); 
 ?>


<!-- https://www.php.net/manual/ru/language.oop5.decon.php-->
</body> 
</html>

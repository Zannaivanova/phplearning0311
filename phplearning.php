<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Анонимные классы</title>
</head>
<body>

<?php//Анонимные классы
// Использование явного класса
class Logger
{
    public function log($msg)
    {
        echo $msg;
    }
}

$util->setLogger(new Logger());

// Использование анонимного класса
$util->setLogger(new class {
    public function log($msg)
    {
        echo $msg;
    }
});
?>


<?php  
class SomeClass {}
interface SomeInterface {}
trait SomeTrait {}

var_dump(new class(10) extends SomeClass implements SomeInterface {
    private $num;

    public function __construct($num)
    {
        $this->num = $num;
    }

    use SomeTrait;
});
?>


<?php 
class Outer {
	private $prop = 1;
	protected $prop2 = 2;

	protected function func1(){
		return 3;
	}

	public function func2(){
		return new class($this->prop) extends Outer {
			private $prop3;

			public function __construct($prop){
				$this->prop3=$prop;
			}

			public function func3(){
				return $this->prop2 + $this->prop3 +$this->func1();
			}
		};
	}
}
echo (new Outer)->func2()->func3();
 ?>


<?php  
function anonymous_class(){
	return new class {};
}
	if (get_class(anonymous_class())===get_class(anonymous_class())){
		echo 'Тот же класс';
	} else {
		echo 'Другой класс';
	}

?>


<!-- https://www.php.net/manual/ru/language.oop5.anonymous.php -->
</body> 
</html>

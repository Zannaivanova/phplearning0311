<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Классы и объекты: Свойства</title>
</head>
<body>

<?php  //Пример #1 Определение свойств


class SimpleClass{
	public $var = ''. '';
	public $var2 = <<<EOD
hello world
EOD;
    public $var3 = 1+2;

       // неправильное определение свойств:
    public $var4 = self::myStaticMethod();
    public $var5 = $myVar;

   // правильное определение свойств:
    public $var6 = myConstant;
    public $var7 = [true, false];

    public $var8 = <<<'EOD'
   hello world

EOD;}
?>


<?php //Пример #2 Пример использования типизированных свойств
class User{
	public int $id;
	public ?string $name;

	public function __construct(int $id, ?string $name){
		$this->id = $id;
		$this->name = $name;
	}
}
 $user = new User(1234, null);

 var_dump($user->id);
 var_dump($user->name);
 ?>


<?php//  Пример #3 Обращение к свойствам

class Shape
{
    public int $numberOfSides;
    public string $name;

    public function setNumberOfSides(int $numberOfSides): void
    {
        $this->numberOfSides = $numberOfSides;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNumberOfSides(): int
    {
        return $this->numberOfSides;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

$triangle = new Shape();
$triangle->setName("triangle");
$triangle->setNumberofSides(3);
var_dump($triangle->getName());
var_dump($triangle->getNumberOfSides());

$circle = new Shape();
$circle->setName("circle");
var_dump($circle->getName());
var_dump($circle->getNumberOfSides());
?>

<!-- https://www.php.net/manual/ru/language.oop5.properties.php-->
</body> 
</html>

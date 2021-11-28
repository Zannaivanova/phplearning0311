<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Абстрактные классы</title>
</head>
<body>

<?php //Пример #1 Пример абстрактного класса
abstract class AbstractClass
{
   /* Данный метод должен быть определён в дочернем классе */
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

   /* Общий метод */
    public function printOut() {
        print $this->getValue() . "\n";
    }
}

class ConcreteClass1 extends AbstractClass
{
    protected function getValue() {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass1";
    }
}

class ConcreteClass2 extends AbstractClass
{
    public function getValue() {
        return "ConcreteClass2";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass2";
    }
}

$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixValue('FOO_') ."\n";

$class2 = new ConcreteClass2;
$class2->printOut();
echo $class2->prefixValue('FOO_') ."\n";
?>


<?php //Пример #2 Пример абстрактного класса

abstract class AbstractClass{    // Наш абстрактный метод требует только определить необходимые аргументы
        abstract protected function prefixName($name);
}

class ConcreteClass extends AbstractClass{    // Наш дочерний класс может определить необязательные аргументы, не указанные в объявлении родительского метода
	public function prefixName($name, $separator = "."){
		if ($name == "Pacman"){
			$prefix = "Mr";
		} elseif ($name == "Pacwoman"){
			$prefix = "Mrs"; 
		} return "{$prefix}{$separator} {$name}";
	}
} 
$class = new ConcreteClass;
echo $class->prefixName("Pacman"), "\n";
echo $class-> prefixName("Pacwoman"), "\n";
?>

<!-- https://www.php.net/manual/ru/language.oop5.abstract.php -->
</body> 
</html>

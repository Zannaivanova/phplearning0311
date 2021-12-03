<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ковариантность и контравариантность</title>
</head>
<body>

<?php  //Ковариантность
abstract class Animal
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function speak();
}

class Dog extends Animal
{
    public function speak()
    {
        echo $this->name . " лает";
    }
}

class Cat extends Animal
{
    public function speak()
    {
        echo $this->name . " мяукает";
    }
}
?>
<?php  
interface AnimalShelter{
    public function adopt (string $name): Animal;
}

class catShelter implements AnimalShelter{
    public function adopt(string $name): Cat{// Возвращаем класс Cat вместо Animal
        return new Cat($name);
    }
}

class DogShelter implements AnimalShelter{
    public function adopt(string $name): Dog{// Возвращаем класс Dog вместо Animal
        return new Dog($name);
    }
}

$kitty = (new CatShelter)->adopt("Рыжик");
$kitty->speak();
echo "\n";

$doggy = (new DogShelter)->adopt("Бобик");
$doggy->speak();
?>




<?php  //Контравариантность


class Food {}

class AnimalFood extends Food {}

abstract class Animal
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function eat(AnimalFood $food)
    {
        echo $this->name . " ест " . get_class($food);
    }
}
?>


<?php

class Dog extends Animal
{
    public function eat(Food $food) {
        echo $this->name . " ест " . get_class($food);
    }
}
?>

<?php

$kitty = (new CatShelter)->adopt("Рыжик");
$catFood = new AnimalFood();
$kitty->eat($catFood);
echo "\n";

$doggy = (new DogShelter)->adopt("Бобик");
$banana = new Food();
$doggy->eat($banana);?>

<!-- https://www.php.net/manual/ru/language.oop5.variance.php -->
</body> 
</html>

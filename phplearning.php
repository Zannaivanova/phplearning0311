<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ключевое слово final</title>
</head>
<body>

<?php  //Пример #1 Пример окончательных (final) методов
class BAseClass{
    public function test(){
        echo 'Вызван метод BaseClass::test()\n';
    }

    final public function moreTesting(){
        echo "Вызван метод BaseClass::moreTesting()\n";
    }
}

class ChildClass extends BaseClass{
    public function moreTesting(){
        echo "Вызван метод ChildClass::moreTesting()\n";
    }
}

// Выполнение заканчивается фатальной ошибкой: Cannot override final method BaseClass::moreTesting()
// (Метод BaseClass::moretesting() не может быть переопределён)
?>


<?php //Пример #2 Пример окончательного (final) класса
final class BaseClass{
    public function test(){
        echo "Вызван метод BaseClass::test()\n";
    }
   // Поскольку класс уже является final, ключевое слово final является избыточным
    final public function moreTesting(){
        echo "BaseClass::moreTesting() called\n";
    }
}
 class ChildClass extends BaseClass{
 }

 // Выполнение заканчивается фатальной ошибкой: Class ChildClass may not inherit from final class (BaseClass)
// (Класс ChildClass не может быть унаследован от окончательного класса (BaseClass))
 ?>



 <?php  //Пример #3 Пример окончательной (final) константы класса, начиная с PHP 8.1.0

 class Foo{
    final public const X = "foo";
 }

 class Bar extends Foo{
    public const X = "bar";
 }
// Ошибка: Bar::X не может переопределить окончательную константу Foo::X
?>



<!-- https://www.php.net/manual/ru/language.oop5.final.php -->
</body> 
</html>

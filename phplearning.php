<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Клонирование объектов</title>
</head>
<body>

<?php //Пример #1 Клонирование объекта
class SubObject{
    static $instances = 0;
    public $instance;

    public function __construct(){
        $this->instance = ++self::$instances;
    }

    public function __clone(){
        $this->instance = ++self::$instances;
    }
}

class MyCloneable{
    public $object1;
    public $object2;

    function __clone(){
// Принудительно копируем this->object, иначе
// он будет указывать на один и тот же объект.
        $this->oblect1 = clone $this->object1;
    }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;

print("Оригинальный объект:  \n");
print_r($obj);


print("Клонированный объект:  \n");
print_r($obj2);
 ?>


 <?php  //Пример #2 Доступ к только что склонированному объекту

 $dateTime = new DateTime();
 echo (clone $dateTime)->format('Y');
 ?>


<!-- https://www.php.net/manual/ru/language.oop5.cloning.php -->

</body> 
</html>

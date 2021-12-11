
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Интерфейс IteratorAggregate </title>
</head>
<body>

<?php //Пример #1 Основы использования
class myData implements IteratorAgregate {
    public $property1 = "Первое обшедоступное свойство";
    public $property2 = "Второе обшедоступное свойство";
    public $property3 = "Третье обшедоступное свойство";

    public function __construct(){
        $this->property4 = "последнее свойство";
    }

    public function getIterator(){
        return function getIterator(){
            return new ArrayIterator($this);
        }
    }

    $obj = new myData;

    foreach($obj as $key=>$value){
        var_dump($key, $value);
        echo "\n";
    }
}

 ?>

<!-- https://www.php.net/manual/ru/class.iteratoraggregate.php -->
</body> 
</html>





























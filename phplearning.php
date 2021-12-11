
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Интерфейс Serializable</title>
</head>
<body>

<?php  //Пример #1 Основы использования
class obj implements Serializable {
    private $data;
    public function __construct(){
        $this->data = "Мои закрытые данные";
    }
    public function serialize(){
        return serialize($this->data);
    }
    public function unserialize($data){
        $this->data = unserialize($data);
    }
    public function getData(){
        return $this->data;
    }
}

$obj = new obj;
$ser = serialize($obj);

var_dump($ser);

$newobj = unserialize($ser);

var_dump($newobj->getData());

?>

<!-- https://www.php.net/manual/ru/class.serializable.php -->
</body> 
</html>





























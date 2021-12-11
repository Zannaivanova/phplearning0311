
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Интерфейс ArrayAccess </title>
</head>
<body>

<?php  //Пример #1 Основы использования
class Obj implements ArrayAccess {
    private $container = array();

    public function __construct(){
        $this->container = array(
            "one"=>1,
            "two"=>2,
            "three"=>3,);
    }

    public function offsetSet($offset, $value){
        if (is_null($offset)){
            $this->container[]=$value;
        } else {
            $this->container[$offset]=$value;
        }
    }

    public function offsetExists($offset){
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset){
        unset($this->container[$offset]);
    }

    public function offsetGet($offset){
        return isset($this->container[$offset])?$this->container[$offset]:null;
    }
}


$obj = new Obj;


var_dump(isset($obj["two"]));
var_dump($obj["two"]);
unset($obj["two"]);
var_dump(isset($obj["two"]));
$obj["two"]="A value";
var_dump($obj["two"]);
$obj[] = 'Append 1';
$obj[] = 'Append 2';
$obj[] = 'Append 3';
print_r($obj);

?>

<!-- https://www.php.net/manual/ru/class.arrayaccess.php -->
</body> 
</html>





























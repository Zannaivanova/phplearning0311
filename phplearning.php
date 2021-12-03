<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Магические методы</title>
</head>
<body>

<?php  //Магические методы
class Connection{
    protected $link;
    private $dsn, $username, $password;

    public function __construct($dsn, $username, $password){
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function connect(){
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }

    public function __sleep(){
        return array('dsn', 'username', 'password');
    }

    public function __wakeup(){
        $this->connect();
    }
}
?>

<?php  //Пример #2 Сериализация и десериализация
class Connection{
    protected $link;
    private $dsn, $username, $password;

    public function __construct($dsn, $username, $password){
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function connect(){
        $this-> link = new PDO($this->dsn, $this->username, $this->password);
    }

    public function __serialize(): array{
        return[
            'dsn'=>$this->dsn,
            'user'=>$this->username,
            'pass'=>$this->password,
             ];
    }

    public function __unserialize(array $data): void{
        $this->dsn = $data['dsn'];
        $this->username = $data['user'];
        $this->password = $data['pass'];

        $this->connect();
    }
}?>


<?php //Пример #3 Простой пример __toString
class TestClass{
    public $foo;

    public function __construct($foo){
        $this->foo = $foo;
    }

    public function __toString(){
        return $this->foo;
    }
}

$class = new TestClass('Привет');
echo $class;
  ?>


  <?php //Пример #4 Использование __invoke()
  class CalllableClass{
    public function __invoke($x){
        var_dump($x);
    }
  }

$obj = new CallableClass;
$obj(5);
var_dump(is_callable($obj));
   ?>


<?php //Пример #5 Использование __set_state()

class A{
    public $var1;
    public $var2;

    public static function __set_state($an_array){
        $obj = new A;
        $obj->var1 = $an_array['var1'];
        $obj->var2 = $an_array['var2'];
        return $obj;
    }
}

$a = new A;
$a->var1 = 5;
$a->var2 = 'foo';

$b = var_export($a, true);
var_dump($b);
eval('$c = ' . $b . ';');
var_dump($c);
 ?>


<?php //Пример #6 Использование __debugInfo()
class C{
    private $prop;

    public function __construct($val){
        $this->prop = $val;
    }

    public function __debugInfo(){
        return [
            'propSquared'=>$this->prop **2,
        ];
    }
}

var_dump(new C(42));


 ?>



<!-- https://www.php.net/manual/ru/language.oop5.magic.php -->
</body> 
</html>

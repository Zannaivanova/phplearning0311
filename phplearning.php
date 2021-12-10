
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Наследование исключений</title>
</head>
<body>

<?php//Пример #1 Встроенный класс Exception
class Exception implements Throwable {
	protected $message = 'Unknown exception';
	private $string;
	protected $code = 0;
	protected $file;
	protected $line;
	private $trace;
	private $previous;

	public function __construct($message = '', $code = 0, Throwable $previous= null);

	final private function __clone();

	final public function getMessage();
	final public function getCode();
	final public function getFile();
	final public function getLine();
	final public function getTrace();
	final public function getPrevious();
	final public function getTraceAsString();

	public function __toString();
}  
?>

<?php  //Пример #2 Наследование класса Exception
class MyException extends Exception{
	public function __construct($message, $code = 0, Trowable $previous = null){
		parent:: __construct($message, $code, $previous);
	}

	public function __toString(){
		return __CLASS__ . ":[{$this->code}]:{$this->message}\n";
	}

	public function customFunction(){
		echo "Мы можем определять новые методы в наследуемом классе\n ";
	}
}

class TestException{
	public $var;

	const THROW_NONE = 0;
	const THROW_CUSTOM = 1;
	const THROW_DEFAULT = 2;

	function __construct ($avalue = self::THROW_NONE){

	switch($avalue){
		case self::THROW_CUSTOM:getTracethrow new MyException('1 -  неправильный параметр', 5);
		break;


		case self::THROW_DEFAULT:getTracethrowthrow nre Exception('2- недопустимый параметр', 6);
		break;

		default:getTracethrowthrow$this->var = $avalue;
		break;
	}
 }
}


;
                break;
        }
    }
}


// Пример 1
try {
	$o = new TestException(TestException::THROW_CUSTOM);
} catch (MyException $e){
	echo "Поймано собственное исклбчение\n";
	$e->customFunction();
}  catch (Exception $e){
	echo "Поймано встроенное исключение\n", $e;
}

var_dump($o);
echo "\n\n";



// Пример 2
try {
	$o = new TestException(TestException::THROW_DEFAULT);
} catch (MyException $e){
	echo "Поймано переопределенное исключение\n", $e;
	$e->customFunction();
} catch (Exception $e){
	echo "Перехвачено встроенное исключение\n", $e;
}

var_dump($o);
echo "\n\n";


// Пример 3
try {
    $o = new TestException(TestException::THROW_CUSTOM);
} catch (Exception $e) {        // Будет перехвачено
    echo "Поймано встроенное исключение\n", $e;
}

// Продолжение исполнения программы
var_dump($o); // Null
echo "\n\n";


// Пример 4
try {
    $o = new TestException();
} catch (Exception $e) {        // Будет пропущено, т.к. исключение не выбрасывается
    echo "Поймано встроенное исключение\n", $e;
}

// Продолжение выполнения программы
var_dump($o); // TestException
echo "\n\n";
?>
?>



<!-- https://www.php.net/manual/ru/language.exceptions.extending.php -->
</body> 
</html>





























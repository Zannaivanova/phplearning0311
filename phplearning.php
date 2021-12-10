
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Исключения </title>
</head>
<body>

<?php //Пример #3 Преобразование сообщения об ошибках в исключение
function exeption_error_handler($severity, $message, $filename, $lineno){
	throw new ErrorExeption($message, 0, $severity, $filename, $lineno);
}
set_error_handler('exeption_error_handler');
 ?>



<?php  //Пример #4 Выбрасывание исключений
function inverse($x) {
    if (!$x) {
        throw new Exception('Деление на ноль.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

// Продолжение выполнения
echo "Привет, мир\n";
?>


<?php  //Пример #5 Обработка исключений с помощью блока finally
function inverse($x) {
    if (!$x) {
        throw new Exception('Деление на ноль.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
} catch (Exception $e) {
    echo 'Поймано исключение: ',  $e->getMessage(), "\n";
} finally {
    echo "Первый блок finally.\n";
}

try {
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Поймано исключение: ',  $e->getMessage(), "\n";
} finally {
    echo "Второй блок finally.\n";
}

// Продолжение нормального выполнения
echo "Привет, мир\n";
?>



<?php  //Пример #6 Взаимодействие между блоками finally и return
function test(){
	try { 
	  throw new Exception('foo');
	}  catch (Exception $e) {
		return 'catch';
	}  finally{
		return 'finally';
	}
}

echo test();
?>

<?php  //Пример #7 Вложенные исключения
class MyException extends Exception {}

class Test {
	public function testing(){
		try {
			try{
				throw new MyException('foo!');
			} catch (MyException $e){
				throw $e;
			}
		} catch (Exception $e){
			var_dump($e->getMessage());
		}
	}
}

$foo = new Test;
$foo->testing();
?>


<?php  //Пример #8 Обработка нескольких исключений в одном блоке catch
class MyException extends Exception {}

class MyOtherException extends Exception {}

class Test {
	public function testing(){
		try {
			throw new MyException();
		} catch (MyException | MyOtherException $e){
			var_dump(get_class($e));
		}
	}
}

$foo = new Test;
$foo->testing();
?>


<?php  //Пример #9 Пример блока catch без указания переменной
class SpecificException extends Exception {}

function test(){
	throw new SpecificException('Ой!');
}

try {
	test();
} catch (SpecificException){
	print " Было поймано исключение SpecificException, но нам безразлично, что у него внутри "
}
?>


<?php  //Пример #10 Throw как выражение
class SpecificException extends Exception {}

function test(){
	do_something_risky() or throw new Exeption('   Все сломалось');
}

try {
	test();
} catch (Exception $e){
	print $e->getMessage();
}
?>



 
<!-- https://www.php.net/manual/ru/language.exceptions.php -->
</body> 
</html>





























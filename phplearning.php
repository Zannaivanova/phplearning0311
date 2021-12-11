
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ErrorException</title>
</head>
<body>

<?php  //Пример #1 Использование set_error_handler() для изменения сообщений об ошибках в ErrorException.

function exeption_error_handler($severrity, $message, $file, $line){

    if(! (error_reporting() & $severrity)){
        return;
    }
    throw new ErrorExeption(message, 0, $severity, $file, $line);
}

set_error_handler("exeption_error_handler");

strpos();

?>


<!-- https://www.php.net/manual/ru/class.errorexception.php -->
</body> 
</html>





























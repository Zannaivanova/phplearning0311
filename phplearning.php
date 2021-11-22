<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Функции: Возврат значений</title>
</head>
<body>
<?php  //Пример #1 Использование конструкции return
function square($num){
        return $num * $num;
}
echo square(4);
?>


<?php  //Пример #2 Возврат нескольких значений в виде массива
function small_numbers(){
        return [0,1,2];
}

// Деструктуризация массива будет собирать каждый элемент массива индивидуально
[$zero, $onq, $two] = small_numbers();

// До версии 7.1.0 единственной эквивалентной альтернативой было использование конструкции list().
list($zero, $one, $two) = small_numbers();
?>

<?php  //Пример #3 Возврат результата по ссылке
function &return_reference(){
        return $someref;
}

$newref = & returns_reference();
?>



<!-- https://www.php.net/manual/ru/functions.returning-values.php-->
</body> 
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><!-- Функции, определяемые пользователем  --></title>
</head>
<body>
<?php  //Пример #1 Псевдокод для демонстрации использования функций
function foo($arg_1, $arg_2, /*..., */$arg_n){
        echo "Пример функции.\n";
        return $retval;
}
?>

<?php //Пример #2 Функции, зависящие от условий  

$makefoo = true;

/* Мы не можем вызвать функцию foo() в этом месте,
   поскольку она ещё не определена, но мы можем
   обратиться к bar() */

bar();

if($makefoo) {
        function foo(){
                echo "Я не существую до тех пор, пока выполнение программы меня не достигнет.\n";
        }
}


if ($makefoo) foo();

function bar(){
        echo "Я существую сразу с начала старта программы.\n";
}
?>

<?php  
function foo(){
        function bar(){
                echo "Я не существую пока не будет вызова foo().\n";
        }
}
/* Мы пока не можем обратиться к bar(),
   поскольку она ещё не определена. */
foo();


/* Теперь мы можем вызвать функцию bar(),
   обработка foo() сделала её доступной. */

bar();
?>

<?php//Пример #4 Рекурсивные функции
function recurtion($a){
        if($a < 20){
                echo "$a\n";
                recurtion($a +1);
        }
}  

?>

       



<!-- https://www.php.net/manual/ru/functions.user-defined.php -->
</body> 
</html>

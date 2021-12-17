
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Сообщения об ошибках</title>
</head>
<body>


<!-- Пример #2 Использование стандартных отладочных переменных -->
    <form method="post" action="attacktarget?errors=Y&amp;showerrors=1&amp;debug=1">
    <input type="hidden" name="errors" value="Y" />
    <input type="hidden" name="showerrors" value="1" />
    <input type="hidden" name="debug" value="1" />
    </form>


<?php//Пример #3 Поиск потенциально опасных переменных при помощи E_ALL
if($username){
	$good_login = 1;
} 
if ($good_ligin == 1){
	readfile("/highly/sensitive/data/index.html");
}
?>


<!-- https://www.php.net/manual/ru/security.errors.php -->
</body> 
</html>





























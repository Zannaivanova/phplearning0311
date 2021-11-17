<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Переменные извне PHP</title>
</head>
<body>

    <!-- Пример #3 Более сложные переменные формы -->
<?php
if ($_POST) {
    echo '<pre>';
    echo htmlspecialchars(print_r($_POST, true));
    echo '</pre>';
}
?>
<form action="" method="post">
    Имя:  <input type="text" name="personal[name]" /><br />
    фото: <input type="image" src="image.gif" name="sub" />
    Email: <input type="text" name="personal[email]" /><br />
    Пиво: <br />
    <select multiple name="beer[]">
        <option value="warthog">Warthog</option>
        <option value="guinness">Guinness</option>
        <option value="stuttgarter">Stuttgarter Schwabenbräu</option>
    </select><br />
    <input type="submit" value="Отправь меня!" />
</form>


<!-- HTTP Cookies -->
<?php  
setcookie("MyCookie[foo]", 'Testing 1', time()+3600);
setcookie("MyCookie[bar]", 'Testing 2', time()+3600);
?>

<!-- Пример #4 Пример использования setcookie() -->
<?php  
if (isset($_COOKIE['count'])){
    $count = $_COOKIE['count']+1;
} else {
    $count = 1;
}
setcookie('count', $count, time()+3600);
setcookie("Cart[$count]", $item, time()+3600);
?>



<!-- https://www.php.net/manual/ru/language.variables.external.php -->
</body>
</html>

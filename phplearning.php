<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Определение пространств имён</title>
</head>
<body>

<?php  //Пример #1 Объявление единого пространства имён
namespace MyProject;

const CONNECT_OK = 1;
class Connection {/*...*/}
function connect(){/*...*/}
?>


<?php  //Пример #2 Объявление простого пространства имён
// <html>
// <?php
// namespace MyProject; // fatal error - объявление пространства имён должно быть первым выражением в скрипте
// ?>
?>

<!-- https://www.php.net/manual/ru/language.namespaces.definition.php -->
</body> 
</html>

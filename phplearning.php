
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Опции контекста Zip</title>
</head>
<body>

<?php //Пример #1 Простой пример использования password
$opts = array(
'zip'=>array(
'password'=>'secret',),);

$context = stream_context_create($opts);

echo file_get_contents('zip://test.zip#test.txt', false, $context);

 ?>

<!-- https://www.php.net/manual/ru/context.zip.php -->
</body> 
</html>





























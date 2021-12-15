
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Контекстные опции сокета</title>
</head>
<body>

<?php //Пример #1 Пример использования bindto

// Соединение с сетью, используя IP '192.168.0.100'
$opts = array(
'socket' =>array(
'bindto' =>'192.168.0.100:0',
),
);

// Соединение с сетью, используя IP '192.168.0.100' и порт '7000'
$opts = array(
'socket'=>array('bindto'=>'192.168.0.100:7000',
),);


// Соединение с сетью, используя IPv6 адрес '2001:db8::1'
// и порт '7000'
$opts = array(
'socket'=>array(
'bindto'=>'[2001:db8::1]:7000',),);


// Соединение с сетью через порт '7000'
$opts = array(
'socket'=>array(
'bindto'=>'0:7000',),);

// Создаём контекст...
$context = stream_context_create($opts);


// ...и используем его для получения данных
echo file_get_contents('http://www.example.com', false, $context);


 ?>

<!-- https://www.php.net/manual/ru/context.socket.php -->
</body> 
</html>





























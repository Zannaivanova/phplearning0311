<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>2 специальных типа: resource </title>
</head>
<body>

<?php
// выводит: stream
$fp = fopen("foo", "w");
echo get_resource_type($fp) . "\n";

// prints: curl
$c = curl_init ();
echo get_resource_type($c) . "\n"; // это работает до версии PHP 8.0.0 так как с версии 8.0 curl_init возвращает объект CurlHandle, а не ресурс
?>


<!-- https://www.php.net/manual/ru/language.types.resource.php
 -->
 	
 </body>
</html>

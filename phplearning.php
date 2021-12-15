
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Опции контекста HTTP</title>
</head>
<body>

<?php //Пример #1 Извлечь страницу и отправить данные методом POST
$postdata = http_build_query(
array(
'var1'=>'некоторое содержимое';
'var2'=>'doh'
));

$opts = array('http'=>
array(
'method' =>'POST',
'header' => 'Content-type: application/x-www-form-urlencoded',
'content' =>$posdata));

$context = stream_context_create($opts);

$result = file_get_contents('http://example.com/submit.php', false, $context);
 ?>

<?php //Пример #2 Игнорировать переадресации, но извлечь заголовки и содержимое
$url = "http://www.example.org/header.php";

$opts = array('http'=>
array(
'method'=>'GET',
'max_redirects' => '0',
'ignore_errors' =>'1'));

$context = stream_context_create($opts);
$stream = fopen($url, 'r', false, $context);

var_dump(stream_get_meta_data($stream));
fclose($stream);
 ?>

<!-- https://www.php.net/manual/ru/context.http.php -->

</body> 
</html>





























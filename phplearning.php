
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Опции контекста CURL</title>
</head>
<body>

<?php //Пример #1 Получает страницу и посылает POST-запрос
$postdata = http_build_query(
array(
'var1'=>'некоторое содержание',
));

$opts = array = array('http'=>
	array(
		'method'=>'POST',
		'header'=>'Content-type: application/x-www-form-urlencoded',
	    'content'=>$postdata)
);

$context = stream_context_create($opts);

$result = file_get_contents('http://example.com/submit.php', false, $context);

 ?>

<!-- https://www.php.net/manual/ru/context.curl.php -->
</body> 
</html>





























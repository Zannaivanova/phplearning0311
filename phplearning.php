
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Работа с удалёнными файлами ¶</title>
</head>
<body>

<?php //Пример #1 Получение заголовка удалённой страницы
$file = fopen("http://www.example.com/", "r");
if (!$file){
	echo "<p>Не возможно открыть даленный файл";
	exit;
}

while (!feof ($file)){
	$line = fgets($file, 1024);
	if (preg_match("@\<title\>(.*)\</title\>@i", $line, $out)){
		$title = $out[1];
		break;
	}
}
fclose($file);
 ?>


<?php//Пример #2 Сохранение данных на удалённом сервере
$file = fopen("ftp://ftp.example.com/incoming/outputfile", "w");
if(!$file){
	echo "Неbозможно перезаписать удаленный файл";
	exit;
} 
fwrite($file, $_SERVER['HTTP_USER_AGENT'].);
fclose($file);

 ?>
<!-- https://www.php.net/manual/ru/features.remote-files.php -->
</body> 
</html>





























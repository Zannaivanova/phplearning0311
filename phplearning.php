
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Поддержка метода PUT</title>
</head>
<body>

<?php //Пример #1 Сохранение файлов, отправленных через HTTP PUT
$putdata = fopen("php://input", "r");

$fp = fopen("myputfile.ext", "w");

while ($data = fread($putdata, 1024))
fwrite($fp, $data);

fclose($fp);
fclose($putdata);

 ?>

<!-- https://www.php.net/manual/ru/features.file-upload.put-method.php -->
</body> 
</html>





























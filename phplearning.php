
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Загрузка файлов методом POST</title>
</head>
<body>

<!-- Пример #1 Форма для загрузки файлов -->
<!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
<form enctype="multipart/form-data" action="__URL__" method="POST">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: <input name="userfile" type="file" />
    <input type="submit" value="Отправить файл" />
</form>


<?php //Пример #2 Проверка загружаемых на сервер файлов
$uploaddir = '/var/www/uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
	echo "Файл корректен и был успешно загружен.";
} else{
	echo "Возможна атака с помощью файловой загрузки";
}

echo 'некотроая отладочная информация: ';
print_r($_FILES);

print "</pre>";
 ?>

 <!-- Пример #3 Загрузка массива файлов -->
 <form action="" method="post" enctype="multipart/form-data">
<p>Изображения:
<input type="file" name="pictures[]" />
<input type="file" name="pictures[]" />
<input type="file" name="pictures[]" />
<input type="submit" value="Отправить" />
</p>
</form>
<?php 
foreach ($_FILES["pictures"]["error"] as $key=>$error){
	if ($error ==UPLOAD_ERR_OK){
		$tmp_name = $_FILES["pictures"]["tmp_name"][$key];
		$name = basename($_FILES["pictures"]["name"][$key]);
		move_uploaded_file($tmp_name, "data/$name");
	}
}
 ?>



<!-- https://www.php.net/manual/ru/features.file-upload.post-method.php -->
</body> 
</html>





























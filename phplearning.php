
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Сокрытие PHP</title>
</head>
<body>
<!-- в .htaccess файлах, так и конфигурационном файле Apache -->

<?php //Пример #1 Маскировка PHP под другие языки программирования
# Теперь PHP-скрипты могут иметь те же расширения, что и другие языки программирования
AddType application/x-httpd-php .asp .py .pl
 ?>


<?php //Пример #2 Использование неизвестных расширений для PHP-скриптов
# Теперь PHP-скрипты могут иметь неизвестные типы файлов
AddType application/x-httpd-php .bop .foo .133t
 ?>


 <?php //Пример #3 Маскировка PHP-файлов под HTML
# Теперь PHP-скрипты выглядят как обыкновенный HTML
AddType application/x-httpd-php .htm .html
  ?>

<!-- https://www.php.net/manual/ru/security.hiding.php -->
</body> 
</html>





























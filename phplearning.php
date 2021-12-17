
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Данные, введённые пользователем</title>
</head>
<body>

<?php //Пример #1 Потенциально опасное использование переменных

// удалить файлы из домашней директории пользователя...
// а может, из ещё какой-нибудь?
unlink ($evil_var);

// записать в лог-файл выполняемое действие...
// а может быть в /etc/passwd?
fwrite($fp, $evil_var);

// выполнение тривиальных действий... или rm -rf *?
system($evil_var);
exec($evil_val);
 ?>

<!-- https://www.php.net/manual/ru/security.variables.php -->
</body> 
</html>





























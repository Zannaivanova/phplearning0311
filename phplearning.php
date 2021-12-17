
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SQL-инъекции</title>
</head>
<body>

<?php //Пример #1 Постраничный вывод результата... и создание суперпользователя в PostgreSQL 
$offset = $argv[0];
$query = "SELECT id, name FROM products ORDER BY name LIMIT 20 OFFSET $offset;";
$result = pg_query($conn, $query);
 ?>


<?php //Пример #2 Листинг статей... и некоторых паролей (для любой базы данных) 
$query = "SELECT id, name, inserted, size FROM products WHERE size = '#size'
";
$result = odbc_exec($conn, $query);
 ?>


<?php //Пример #3 От восстановления пароля... до получения дополнительных привилегий (для любой базы данных) 
$query = "UPDATE usertable SET pwd='$pwd' WHERE uid='$uid';";
 ?>


 <?php 

// $uid: ' or uid like '%admin%
$query="UPDATE usertable SET pwd='...' WHERE uid='' or uid like '%admin%';";

// $pwd: hehehe', trusted=100, admin='yes
$query = "UPDATE usertable SET pwd='hehehe', trusted=100, admin='yes' WHERE ...;";
  ?>



<?php  //Пример #4 Выполнение команд операционной системы на сервере (для базы MSSQL)
$query = "SELECT * FROM products WHERE id LIKE '%$prod%'";
$result = mssql_query($query);
?>

<?php 
$query = "SELECT*FROM products
WHERE id LIKE '%a%'
exec master...xp_cmdshell 'net user test testpass /ADD' --%";
$result = mssql_query($query); ?>


<?php//Пример #5 Более безопасная реализация постраничной навигации
settype($offset, 'integer');
$query = "SELECT id, name FROM products ORDER BY name LIMIT 20 OFFSET $offset;";

$query = sprintf("SELECT id, name FROM products ORDER BY name LIMIT 20 OFFSET %d;", $offset);  
?>

<!-- https://www.php.net/manual/ru/security.database.sql-injection.php#security.database.sql-injection -->
</body> 
</html>





























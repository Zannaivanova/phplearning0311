
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Безопасность файловой системы</title>
</head>
<body>

<?php //Пример #1 Недостаточная проверка внешних данных ведёт к...
$username = $_POST['user_submitted_name'];
$userlife = $_POST['user_submited_filename'];
$homedir = "/home/$username";

unlink("$homedir/$userfile");

echo "Файл был удален";
 ?>
	
<?php //Пример #2 ... атаке на файловую систему
$username = $_POST['user_submitted_name'];
$userfile = $_POST['user_submitted_filename'];
$homedir = "/home/$username";

unlink("$homedir/$userfile");

echo "Файл был удален" 
?>


<?php//Пример #3 Более безопасная проверка имени файла
$username = $_SERVER['REMOTE_USER'];
$userfile = basename($_POST['user_submitted_filename']);
$homedir = "/home/$username";

$filepath = "$homedir/$userfile";

if(file_exists($filepath) && unlink($filepath)){
	$logstring = "$filepath удален";
}  else {
	$logstring = "Не удалось удалить $filepath\n";
}
$fp = fopen("/home/logging/filedelete.log", "a");
fwrite($fp, $logstring);
fclose($fp);

echo htmlentities($logstring, ENT_QUOTES);
?>

<?php//Пример #4 Более строгая проверка имени файла
$username = $_SERVER['REMOTE_USER'];
$userfile = $_POST['user_submitted_filename'];
$homedir = "/home/$username";

$filepath = "$homedir/$userfile";

if(!ctype_alnum($username)|| !preg_match('/^(?:[a-z0-9_-]|\.(?!\.))+$/iD', $userfile)) {
	die("Непраильное имя пользователя или файл");
}

 ?>


<?php //Пример #1 Скрипт, уязвимый к нулевому байту
$file = $_GET['file'];
if (file_exists('/home/wwwrun/'.$file.'.php')){
	include '/home/wwwrun/'.$file.'.php';
}

 ?>


<?php //Пример #2 Корректная проверка входных данных
$file = $_GET['file'];

switch($file){
	case 'main':
	case 'foo':
	case 'bar':
	 include '/home/wwwrun/include/'.$file.'.php';
	 break;
	 default:
	 include '/home/wwwrun/include/main.php';
}

 ?>


 
<!-- https://www.php.net/manual/ru/security.filesystem.php -->
</body> 
</html>





























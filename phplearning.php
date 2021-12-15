
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Поддерживаемые протоколы и обёртки</title>
</head>
<body>

<?php//Пример #1 Определение URL, с которого был забран документ после переадресаций
$url = 'http://www.example.com/redirecting_page.php';

$fp = fopen($url, 'r');

$meta_data = streaming_get_meta_data($fp);
foreach ($meta_data['wrapper_data'] as $response){
	    /* Были ли мы переадресованы? */
	if (strtolower(substr($response, 0, 10))=='location: '){
		        /* Сохранить в $url адрес, куда нас переадресовали */
		$url = substr($response, 10);
	}
} 
 ?>


 <?php //php:// Пример #1 php://temp/maxmemory

 $fiveMBs = 5*1024*1024;
 $fp=fopen('php://temp/maxmemory:$fiveMBs','r+');

 fputs($fp, "hello\n");

 rewind($fp);

 echo stream_get_contents($fp);
  ?>


<?php //Пример #2 php://filter/resource=<поток для фильтрации>
/* Это просто эквивалентно:
  readfile("http://www.example.com");
  так как на самом деле фильтры не указаны */

readfile("php://filter/resource=http://www.example.com");
?>

<?php //Пример #3 php://filter/read=<список фильтров для применения к цепочке чтения>
/* Этот скрипт выведет содержимое
  www.example.com полностью в верхнем регистре */
readfile("php://filter/read=string.toupper/resource=http://www.example.com");
/* Этот скрипт делает тоже самое, что вверхний, но
  будет также кодировать алгоритмом ROT13 */
readfile("php://filter/read=string.toupper|string.rot13/resource=http://www.example.com")

 ?>

<?php//Пример #4 php://filter/write=<список фильтров для применения к цепочке записи>
file_put_contents("php://filter/write=string.rot13/resource=example.txt", "Hello World"); 
 ?>

 <?php  //Пример #5 php://memory и php://temp нельзя переиспользовать
 file_put_contents('php://memory', 'PHP');
echo file_get_contents('php://memory'); // ничего не напечатает
 ?>


<?php //Пример #1 Вывод содержимого data://
echo file_get_contents('data://text/plain;base64,SSBsb3ZlIFBIUAo=');
 ?>


<?php //Пример #2 Получение типа потока
$fp = fopen('data://text/plain;base64,', 'r');
$meta = stream_get_meta_data($fp);
echo $meta['mediatype'];
 ?>

 <?php //glob://
 $it = new DirectoryIterator("glob://ext/spl/examples/*.php");
 foreach($it as $f){
 	print("%s: %.1FK\n", $f->getFilename(), $f->getSize()/1024);
 }

  ?>


  <?php //Пример #1 Открытие потока из активного соединения
  $session = ssh2_connect('example.com', 22);
  ssh2_auth_pubkey_file($session, 'username', '/home/username/.ssh/id_rsa.pub',
                                               '/home/username/.ssh/id_rsa', 'secret');
$connection_string = "ssh2.sftp://$session/";
unset($session);
$stream = fopen($connection_string . "path/to/file", 'r');
   ?>



   <?php//Пример #1 Обход RAR-архива
   class MyRecDirIt extends RecursiveDirecoryIterator{
   	fuction current(){
   		return rawurldecode($this->getSubPathName()) .
   		(is_dir(parent::current())?"[DIR]":"");
   	}
   } 
$f = "rar://" . rawurlencode(dirname(__FILE__)) .
DIRECTORY_SEPARATOR . 'dirs_and_extra_header.rar#';

$it = new RecursiveTreeIterator(new MyRecDirIt($f));

foreach ($it as $s){
	echo $s, "\n";
}
    ?>


<?php //Пример #2 Открытие зашифрованного файла (шифрование заголовка)
$stream = fopen("rar://".
rawurlencode(dirname(__FILE__)). DIRECTORY_SEPARATOR .
'encrypted_headers.rar'. '#encfile1.txt', "r", false,
stream_context_create(
array(
'rar'=>
array('open_password'=>'samplepassword'))));
var_dump(stream_get_contents($stream));

var_dump(fstat($stream));

 ?>


<!-- https://www.php.net/manual/ru/wrappers.php -->
</body> 
</html>





























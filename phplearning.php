<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>4 смешанные типа: Объекты</title>
</head>
<body>
<?php 
class foo {
	function do_foo(){
		echo "Код foo.";
	}
} 

$bar = new foo;
$bar->do_foo();
?>


<?php 
$obj = (object) array ('1'=>'foo');
var_dump(isset($obj->{'1'}));
var_dump(key($obj));
 ?>

 <?php 
$obj = (object)'привет';
echo $obj->scalar;
  ?>

<!-- https://www.php.net/manual/ru/language.types.object.php -->
</body>
</html>

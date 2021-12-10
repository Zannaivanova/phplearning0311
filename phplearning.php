
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fibers</title>
</head>
<body>

<?php  //Пример #1 Basic usage
$fiber = new Fiber(function (): void {
   $value = Fiber::suspend('fiber');
   echo "Значение возобновлённого файбера: ", $value, PHP_EOL;
});

$value = $fiber->start();

echo "Значение приостановленного файбера: ", $value, PHP_EOL;

$fiber->resume('test');
?>

<!-- https://www.php.net/manual/ru/language.fibers.php -->
</body> 
</html>





























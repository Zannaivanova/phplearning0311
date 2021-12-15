
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Класс WeakMap</title>
</head>
<body>

<?php//Пример #1 Пример использования Weakmap
$wm = new WeakMap();

$o = new StdClass;

class A {
    public function __destruct() {
        echo "Уничтожено!\n";
    }
}

$wm[$o] = new A;

var_dump(count($wm));
echo "Сброс...\n";
unset($o);
echo "Готово\n";
var_dump(count($wm)); 
?>

<!-- https://www.php.net/manual/ru/class.weakmap.php -->
</body> 
</html>





























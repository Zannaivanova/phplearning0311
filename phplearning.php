<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Сериализация объектов</title>
</head>
<body>

<?php 

class A {
// classa.inc:
    public $one = 1;

    public function show_one(){
        echo $this->one;
    }
} 

// page1.php:

include("classa.inc");

$a = new A;
$s = serialize($a);


  // сохраняем $s где-нибудь, откуда page2.php сможет его получить.
file_put_contents('store', $s);
?>

<!-- https://www.php.net/manual/ru/language.oop5.serialization.php -->
</body> 
</html>

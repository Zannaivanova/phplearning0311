<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Сравнение объектов</title>
</head>
<body>

<?php  //Пример #1 Пример сравнения объектов

function bool2str($bool){
    return (string) $bool;
}

function compareObjects(&$o1, &$o2){
    echo '01==o2: '. bool2str($o1==$o2) . "\n";
    echo 'o1!=o2: '. bool2str($o1!=$o2) . "\n";
    echo 'o1 ===o2: '. bool2str($o1 ===$o2) . "\n";
    echo 'o1!==o2: '. bool2str($o1!==$o2) . "\n";
}

class Flag{
    public $flag;
    function __construct($flag = true){
        $this->flag = $flag;
    }
}

class OtherFlag{
    public $flag;

    function __construct($flag = true){
        $this->flag = $flag;
    }
}

$o = new Flag();
$p = new Flag();
$q = $o;
$r = new OtherFlag();

echo "Два экземпляра олного и того же класса\n";
compareObjects($o, $p);

echo "\nДве ссылки на один и тот же экземпляр\n";
compareObjects($o, $q);

echo "\nЭкземпляры двух разных классов\n";
compareObjects($o, $r);


?>

<!-- https://www.php.net/manual/ru/language.oop5.object-comparison.php -->

</body> 
</html>

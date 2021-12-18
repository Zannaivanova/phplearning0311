
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Сборка мусора</title>
</head>
<body>

<?php//Основы подсчёта ссылок Пример #1 Создание нового контейнера zval
$a="new string";
xdebug_debug_zval('a'); 
 ?>


<?php //Пример #3 Увеличение счётчика ссылок zval
$a = "new string";
$b = $a;
xdebug_zval('a');
 ?>

<?php //Пример #4 Уменьшение счётчика ссылок zval
$a = "new string";
$c = $b = $a;
xdebug_zval('a');
$b = 42;
unset($c);
xdebug_debug_zval('a');
 ?>


<?php //Пример #6 Добавление уже существующего элемента в массив
$a = array('meaning'=>'life', 'number' => 42 );
$a['life'] = $a['meaning'];
xdebug_debug_zval('a');
 ?>


 <?php //Пример #7 Удаление элемента из массива
 $a = array('meaning'=>'life', 'number'=>42);
 $a['life'] = $a['meaning'];
 unset($a['meaning'], $a['number']);
 xdebug_debug_zval('a');
  ?>


  <?php //Пример #8 Добавление массива новым элементом в самого себя
$a = array('one');
$a[] = &$a;
xdebug_debug_zval('a');
   ?>


   <?php //Пример #1 Пример использования памяти
   class Foo{
   	public $val = '3.14159265359';
   }

   $baseMemory = memory_get_usage();

   for($i=0; $i<100000; $i++){
   	$a = new Foo;
   	$a->self = $a;
   	if($i%500===0){
   		echo sprintf('%8d: ', $i), memory_get_usage( ) - $baseMemory;
   	}
   }
    ?>


    <?php //Пример #2 Влияние на производительность
    class Foo{
    	public $val = '3.1415';
    }

    for ($i = o; $i<=1000000;$i++){
    	$a = new Foo;
    	$a->self = $a;
    }
echo memory_get_peak_usage();
     ?>


     <?php Пример #3 Запуск скрипта
     time php -dzend.enable_gc=0 -dmemory_limit=-1 -n example2.php
# и
time php -dzend.enable_gc=1 -dmemory_limit=-1 -n example2.php

      ?>
<!-- https://www.php.net/manual/ru/features.gc.php -->
</body> 
</html>





























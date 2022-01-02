<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>xhprof Hierarchical Profiler</title>    
</head>
<body>
 <?php //Пример #1 Пример использования xhprof_disable()
xhprof_enable();

$foo = strlen("foo bar");

$xhprof_data = xhprof_disable();

print_r($xhprof_data);
  ?>    


<?php //Пример #1 Пример использования xhprof_disable()
// 1. время исполнения + память + CPU; также игнорируем функции
стандартной библиотеки
xhprof_enable(XHPROF_FLAGS_NO_BUILTINS | XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);

// 2. время исполнения; игнорируем функции ignore call_user_func*
xhprof_enable(
    0,
    array('ignored_functions' =>  array('call_user_func',
                                        'call_user_func_array')));

// 3. время исполнения + память; игнорируем функции call_user_func*
xhprof_enable(
    XHPROF_FLAGS_MEMORY,
    array('ignored_functions' =>  array('call_user_func',
                                        'call_user_func_array')));
?>


<?php //Пример #1 Пример использования xhprof_sample_disable()
xhprof_sample_enable();

for($i=0; $i<=10000; $i++){
    $a = strlen($i);
    $b = $i*$a;
    $c = rand();
}
$xhprof_data = xhprof_sample_disable();
print_r($xhprof_data);
 ?>


<!-- https://www.php.net/manual/ru/book.xhprof.php -->
</body> 
</html>





























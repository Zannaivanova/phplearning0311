<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Windows Cache для PHP</title>    
</head>
<body>
     <!-- wincache_fcache_fileinfo — Получает информацию о файлах, закешированных в файловом кеше -->
<?php //Пример #1 Пример использования wincache_fcache_fileinfo()
print_r(wincache_fcache_fileinfo());
 ?>


    <!-- wincache_fcache_meminfo — Получает информацию об использовании памяти файлового кеша -->
<?php //Пример #1 Пример использования wincache_fcache_meminfo()
print)r(wincache_fcache_meminfo());
 ?>

    <!-- wincache_lock — Получает эксклюзивную блокировку для данного ключа -->
<?php //Пример #1 Пример использования wincache_lock() 
$fp = fopen("/tmp/lock.txt", "r+");
if (wincache_lock("lock_txt_lock")){
ftruncate($fp, 0);
fwrite($fp, "Напиши что-нибудь здесь");
wincache_unlock("lock_txt_lock");
} else {
    echo "не удалось получить блокировку";
}
fclose($fp);
?>

    <!-- wincache_ocache_fileinfo — Получает информацию о файлах, закешированных в кеше опкодов -->
    <!-- wincache_ocache_meminfo — Получает информацию об использовании кеш-памяти опкодов -->

    <!-- wincache_refresh_if_changed — Обновляет записи кеша для закешированных файлов -->
<?php //Пример #1 Пример использования wincache_refresh_if_changed()
$filename = 'C:\inetpub\wwwroot\config.php';
$handle = fopen($filename, 'w+');
if ($handle === FALSE) die('Failed to open file '.$filename.' for writing');
fwrite($handle, '<?php $setting=something; ?>');
fclose($handle);
wincache_refresh_if_changed(array($filename));
?>

    <!-- wincache_rplist_fileinfo — Получает информацию о разрешении кеша пути к файлу разрешения -->
    <pre>
<?php //Пример #1 Пример использования wincache_rplist_fileinfo()
print_r(wincache_rplist_fileinfo());
 ?>
</pre>
    <!-- wincache_rplist_meminfo — Получает информацию об использовании памяти с помощью кеша пути к файлу разрешения -->
<pre>
<?php //Пример #1 Пример использования wincache_rplist_meminfo()
print_r(wincache_rplist_meminfo());
 ?>
</pre>


    <!-- wincache_scache_info — Получает информацию о файлах, закешированных в кеше сессии -->
<pre>
<?php//Пример #1 Пример использования wincache_scache_info()
print_r(wincache_scache_info());
?>
</pre>

    <!-- wincache_scache_meminfo — Получает информацию об использовании кеш-памяти сессии -->
<pre>
<?php//Пример #1 Пример использования wincache_scache_meminfo()
print_r(wincache_scache_meminfo());
?>
</pre>

    <!-- wincache_ucache_add — Добавляет переменную в пользовательский кеш, только если переменная ещё не существует в кеше -->

<?php//Пример #1 Пример использования wincache_ucache_add() с key в виде строки
$bar = 'BAR';
var_dump(wincache_ucache_add('foo', $bar));
var_dump(wincache_ucache_add('foo', $bar));
var_dump(wincache_ucache_get('foo'));
?>



<?php//Пример #2 Пример использования wincache_ucache_add() с key в виде массива
$colors_array = array('green' => '5', 'Blue' => '6', 'yellow' => '7', 'cyan' => '8');
var_dump(wincache_ucache_add($colors_array));
var_dump(wincache_ucache_add($colors_array));
var_dump(wincache_ucache_get('Blue'));
?>


    <!-- wincache_ucache_cas — Сравнивает переменную со старым значением и присваивает ей новое значение -->
<?php//Пример #1 Пример использования wincache_ucache_cas()
wincache_ucache_set('counter', 2922);
var_dump(wincache_ucache_cas('counter', 2922, 1));
var_dump(wincache_ucache_get('counter'));
?>

    <!-- wincache_ucache_clear — Удаляет всё содержимое пользовательского кеша -->
<?php//Пример #1 Пример использования wincache_ucache_clear()
wincache_ucache_set('green', 1);
wincache_ucache_set('red', 2);
wincache_ucache_set('orange', 4);
wincache_ucache_set('blue', 8);
wincache_ucache_set('cyan', 16);
$array1 = array('green', 'red', 'orange', 'blue', 'cyan');
var_dump(wincache_ucache_get($array1));
var_dump(wincache_ucache_clear());
var_dump(wincache_ucache_get($array1));
?>


    <!-- wincache_ucache_dec — Уменьшает значение, связанное с ключом -->
<?php//Пример #1 Пример использования wincache_ucache_dec()
wincache_ucache_set('counter', 1);
var_dump(wincache_ucache_dec('counter', 2923, $success));
var_dump($success);
?>


    <!-- wincache_ucache_delete — Удаляет переменные из пользовательского кеша -->
<?php//Пример #1 Пример использования wincache_ucache_delete() с key в виде строки
wincache_ucache_set('foo', 'bar');
var_dump(wincache_ucache_delete('foo'));
var_dump(wincache_ucache_exists('foo'));
?>


<?php//Пример #2 Пример использования wincache_ucache_delete() с key в виде массива
$array1 = array('green' => '5', 'blue' => '6', 'yellow' => '7', 'cyan' => '8');
wincache_ucache_set($array1);
$array2 = array('green', 'blue', 'yellow', 'cyan');
var_dump(wincache_ucache_delete($array2));
?>


<?php//Пример #3 Пример использования wincache_ucache_delete() с key в виде массива, из которого нельзя удалить некоторые элементы
$array1 = array('green' => '5', 'blue' => '6', 'yellow' => '7', 'cyan' => '8');
wincache_ucache_set($array1);
$array2 = array('orange', 'red', 'yellow', 'cyan');
var_dump(wincache_ucache_delete($array2));
?>

    <!-- wincache_ucache_exists — Проверяет, существует ли переменная в пользовательском кеше -->
<?phpПример #1 Пример использования wincache_ucache_exists()
if (!wincache_ucache_exists('green'))
    wincache_ucache_set('green', 1);
var_dump(wincache_ucache_exists('green'));
?>


    <!-- wincache_ucache_get — Получает переменную, хранящуюся в пользовательском кеше -->
<?php//Пример #1 wincache_ucache_get() с key в виде строки
wincache_ucache_add('color', 'blue');
var_dump(wincache_ucache_get('color', $success));
var_dump($success);
?>


<?php//Пример #2 wincache_ucache_get() с key в виде массива
$array1 = array('green' => '5', 'Blue' => '6', 'yellow' => '7', 'cyan' => '8');
wincache_ucache_set($array1);
$array2 = array('green', 'Blue', 'yellow', 'cyan');
var_dump(wincache_ucache_get($array2, $success));
var_dump($success);
?>

    <!-- wincache_ucache_inc — Увеличивает значение, связанное с ключом -->
<?phpПример #1 Пример использования wincache_ucache_inc()
wincache_ucache_set('counter', 1);
var_dump(wincache_ucache_inc('counter', 2921, $success));
var_dump($success);
?>


    <!-- wincache_ucache_info — Получает информацию о данных, хранящихся в пользовательском кеше -->
<?php//Пример #1 Пример использования wincache_ucache_info()
wincache_ucache_get('green');
wincache_ucache_set('green', 2922);
wincache_ucache_get('green');
wincache_ucache_get('green');
wincache_ucache_get('green');
print_r(wincache_ucache_info());
?>


    <!-- wincache_ucache_meminfo — Получает информацию об использовании памяти пользовательского кеша -->
<pre>
<?php//Пример #1 Пример использования wincache_ucache_meminfo()
print_r(wincache_ucache_meminfo());
?>
</pre>


    <!-- wincache_ucache_set — Добавляет переменную в пользовательский кеш и перезаписывает переменную, если она уже существует в кеше -->
<?php//Пример #1 Пример использования wincache_ucache_set() с key в виде строки
$bar = 'BAR';
var_dump(wincache_ucache_set('foo', $bar));
var_dump(wincache_ucache_get('foo'));
$bar1 = 'BAR1';
var_dump(wincache_ucache_set('foo', $bar1));
var_dump(wincache_ucache_get('foo'));
?>

    <!-- wincache_unlock — Снимает эксклюзивную блокировку данного ключа -->

<?php//Пример #1 Пример использования wincache_unlock()
$fp = fopen("/tmp/lock.txt", "r+");
if (wincache_lock(“lock_txt_lock”)) { // получить эксклюзивную блокировку
    ftruncate($fp, 0); // обрезать файл
    fwrite($fp, "Напишите что-нибудь здесь\n");
    wincache_unlock(“lock_txt_lock”); // снять блокировку
} else {
    echo "Не удалось получить блокировку!";
}
fclose($fp);
?>


<!-- https://www.php.net/manual/ru/book.wincache.php -->
</body> 
</html>





























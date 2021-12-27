<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление буфером вывода</title>    
</head>
<body>

<?php //Пример #1 Пример контроля вывода
ob_start();
echo "привет";

setcookie("cookiename", "cookiedata");

ob_end_flush(); ?>


<?php //Пример #1 Пример перезаписи вывода

$_SERVER['HTTP_HOST'] = 'php.net';

ini_set('url_rewriter.tags', 'a=href, from =');
var_dump(ini_get('url_rewriter.tags'));

output_add_rewrite_var('test', 'value');

output_add_rewrite_var('test', 'value');
 ?>

 <a href="//php.net/index.php?bug=1234">bug1234</a>
<form action="https://php.net/?bug=1234&edit=1" action="post">
 <input type="text" name="title" />
</form>


   <!--  flush — Сброс системного буфера вывода
    ob_clean — Очистить (стереть) буфер вывода
    ob_end_clean — Очистить (стереть) буфер вывода и отключить буферизацию вывода
    ob_end_flush — Сбросить (отправить) буфер вывод и отключить буферизацию вывода
    ob_flush — Сбросить (отправить) буфер вывода
    ob_get_clean — Получить содержимое текущего буфера и удалить его
    ob_get_contents — Возвращает содержимое буфера вывода
    ob_get_flush — Сбросить буфер вывода, вернуть его в виде строки и отключить буферизацию вывода
    ob_get_length — Возвращает размер буфера вывода
    ob_get_level — Возвращает уровень вложенности механизма буферизации вывода
    ob_get_status — Получить статус буфера вывода
    ob_gzhandler — callback-функция, используемая для gzip-сжатия буфера вывода при вызове ob_start
    ob_implicit_flush — Включение/выключение неявного сброса
    ob_list_handlers — Список всех используемых обработчиков вывода
    ob_start — Включение буферизации вывода
    output_add_rewrite_var — Добавить значения в обработчик URL
    output_reset_rewrite_vars — Сбросить значения обработчика URL
 -->

<?php //Пример #1 Пример использования функции ob_end_clean()
ob_start();
echo 'текст, который не отобразится';
ob_end_clean();
 ?>


<?php //Пример #1 Простой пример использования функции ob_get_clean()
ob_start();

echo "привет мир";

$out = ob_get_claen();
$out = strtolower($out);

var_dump($out);
 ?>


 <?php //Пример #1 Простой пример использования функции ob_get_contents()

 ob_start();
 echo "привет";

 $out1 = ob_get_contents();

 echo "мир";

 $out2 = ob_get_contents();

 ob_end_clean();

 var_dump($out1, $out2); ?>


 <?php //Пример #1 Пример использования функции ob_get_flush()
print_r(ob_list_handlers());

$buffer = ob_get_flush();
file_put_contents('buffer.txt', $buffer);

print_r(ob_list_handlers());
  ?>


<?php //Пример #1 Простой пример использования функции ob_get_length()
ob_start();

echo "привет";

$len1 = ob_get_lenth();

echo "мир";

$len2 = ob_get_lenth();

ob_end_clean();

echo $len1 . ", ".$len2;
 ?>

<?php //Пример #1 Пример использования функции ob_gzhandler()
ob_start("ob_gzhandler");
 ?>

 <html>
<body>
<p>Это должно быть сжатой страницей.</p>
</body>
</html>


<?php //Пример #1 Пример использования функции ob_list_handlers()
print_r(ob_list_handlers());
ob_end_flush();

ob_start("ob_handler");
print_r(ob_list_handlers());
ob_end_flush();

ob_start(function($string){
    return $string;
});
print_r(ob_list_handlers());
ob_end_flush();
 ?>


<?php //Пример #1 Пример callback-функции, определённой пользователем
function callback($buffer){
    return(str_replace("яблоки", "апельсин", "$buffer"));
}

ob_start("callback"); ?>

<html>
<body>
<p>Это всё равно что сравнить яблоки и апельсины.</p>
</body>
</html>

<?php 
ob_end_flush(); ?>


<?php //Пример #2 Создание нестираемого буфера вывода

ob_start(null, 0, PHP_OUTPUT_HANDLER_STDFLAGS ^ PHP_OUTPUT_HANDLER_REMOVABLE); ?>


<?php //Пример #1 Пример использования функции output_add_rewrite_var()
output_add_rewrite_avr('var', 'value');

echo '<a href="file.php">ссылка</a>
<a href="http://example.com">ссылка2</a>';

echo '<form action="script.php" method="post">
<input type="text" name="var2" />
</form>';

print_r(ob_list_handlers());
 ?>

<?php //Пример #1 Пример использования функции output_reset_rewrite_vars()

session_start();
output_add_rewrite_var('var', 'value');

echo '<a href="file.php">ссылка</a>';
ob_flush();

output_reset_rewrite_vars();
echo '<a href="file.php">ссылка</a>'; ?>

<!-- https://www.php.net/manual/ru/book.outcontrol.php -->
</body> 
</html>





























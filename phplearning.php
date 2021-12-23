<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользовательский кеш APC</title>    
</head>
<body>
<!-- Функции APCu -->

    <!-- apcu_add — Добавить переменную в кеш -->
<?php //Пример #1 Пример использования apcu_add()
$bar = 'BAR';
apcu_add('foo', $bar);
var_dump(apcu_fetch('foo'));
echo "\n";
$bar = 'NEVER GETS SET';
apcu_add('foo', $bar);
var_dump(apcu_fetch('foo'));
echo "\n";
 ?>
    <!-- apcu_cache_info — Извлекает закешированную информацию из хранилища APCu -->
<?php //Пример #1 Пример использования apcu_cache_info()
print_r(apcu_cache_info());
     ?>

    <!-- apcu_cas — Заменяет старое значение на новое -->
<?php //Пример #1 Пример использования apcu_cas()
apcu_store('foobar', 2);
echo '$foobar = 2', PHP_EOL;
echo '$foobar == 1?2:1 = ', (apcu_cas('foobar', 1,2)?'ok':'fail'), PHP_EOL;
echo '$foobar == 2?1 :2 =', (apcu_cas('foobar', 2, 1)?'ok':'fail'), PHP_EOL;

echo '$foobar = ', apcu_fetch('foobar'), PHP_EOL;

echo '$__bar == 1?2:1 = ',(apcu_cas('f__bar', 1, 2)?'ok':'fail'), PHP_EOL

apcu_store('perfection', 'xyz');
echo '$perfection == 2?1:2 = ', (apcu_cas('perfection', 2, 1)?'ok':'epic fail'), PHP_EOL;

echo '$foobar = ', apcu_fetch('foobar'), PHP_EOL;

 ?>


    <!-- apcu_clear_cache — Очистить кеш APCu -->

    <!-- apcu_dec — Уменьшить сохранённое число -->
<?php //Пример #1 Пример использования apcu_dec()
echo "Сделаем что-то без ошибки", PHP_EOL;

apcu_store('anumber', 42);

echo apcu_fetch('anumber'), PHP_EOL;

echo apcu_dec('anumber',10), PHP_EOL;
echo apcu_dec('anumber', 10, $success), PHP_EOL;

var_dump($success);

echo "А теперь с ошибкой", PHP_EOL, PHP_EOL;

apcu_store('astring', 1, $fail);

var_dump($ret);
var_dump($fail);

 ?>


    <!-- apcu_delete — Удаляет сохранённое значение из кеша -->
<?php //Пример #1 Пример использования apcu_delete()
$bar = 'BAR';
apcu_store('foo', $bar);

apcu_delete('foo');

apcu_delete(['foo', 'bar', 'baz']);

apcu_delete(new APCUIterator('#^myprefix_#'));
 ?>




<!--     apcu_enabled — Возможно ли использовать APCu в текущем окружении -->

<!--     apcu_entry — Автоматическое извлечение или создание записи в кеше -->
<?php //Пример #1 Пример использования apcu_entry()
$config = apcu_entry("config", function($key){
    return [
        "fruit"=>apcu_entry("config.fruit", function($key){
            return [
                "apples",
                "pears"];
        }),
        "people" =>apcu_entry("config.people", function($key){
            return [
                "bob",
                "joe",
                "niki"
            ];
        })
    ];
});
var_dump($config);
 ?>


<!--     apcu_exists — Проверяет, существуют ли записи -->
<?php //Пример #1 Пример использования apcu_exists()
$fruit = 'apple';
$veggie = 'carrot';

apcu_store('foo', $fruit);
apcu_store('bar', $veggie);

if(apcu_exists('foo')){
    echo "Foo c: ";
    echo apcu_fetch('fetch('foo);
} else {
    echo "Foo не существует";
}

echo PHP_EOL;
if (apcu_exists('baz')){
echo "Baz не существует.";
}else {
echo "Baz не существует";
}

echo PHP_EOL;

$ret = apcu_exists(array('foo', 'donotexist', 'bar'));
var_dump($ret);
 ?>


<!--     apcu_fetch — Извлекает из кеша сохранённую переменную -->
<?php //Пример #1 Пример использования apcu_fetch()
$bar = 'BAR';
apcu_store('foo', $bar);
var_dump(apcu_fetch('foo'));

 ?>


<!--     apcu_inc — Увеличить сохранённое число -->
<?php //Пример #1 Пример использования apcu_inc()
echo "Сделаем что-то без ошибки", PHP_EOL;

apcu_store('anumber',42);

echo apcu_fetch('anumber'), PHP_EOL;

echo apcu_inc('anumber'), PHP_EOL;
echo apcu_inc('anumber', 10), PHP_EOL;
echo apcu_inc('anumber', 10, $success), PHP_EOL;

var_dump($success);

echo "А теперь с ошибкой", PHP_EOL, PHP_EOL;

apcu_store('astring', 'foo');

$ret = apcu_inc('astring', 1, $fail);

var_dump($ret);
var_dump($fail);

 ?>


<!--     apcu_key_info — Получить детальную информацию о ключе в кеше -->
<?php //Пример #1 Пример использования apcu_key_info()
apcu_add('a', 'b');
var_dump(apcu_key_info('a'));
 ?>

<!--     apcu_sma_info — Извлекает информацию о выделении разделяемой памяти APCu -->
<?php //Пример #1 Пример использования apcu_sma_info()
print_r(apcu_sma_info());
 ?>


<!--     apcu_store — Кеширует переменную -->
  <?php //Пример #1 Пример использования apcu_store()
  $bar = 'BAR';
  apcu_store('foo', $bar);
  var_dump(apcu_fetch('foo'));
   ?>

<!-- https://www.php.net/manual/ru/book.apcu.php -->
</body> 
</html>



























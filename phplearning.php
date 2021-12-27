<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интерфейс внешней функции (Foreign Function Interface)</title>    
</head>
<body>

<?php //Пример #1 Вызов функции из общей библиотеки
$ffi = FFI::cdef(
"int printf(const char *format, ...",
"libc.so.6");

$ffi->printf("привет, %s!", "мир");
 ?>


<?php //Пример #2 Вызов функции и возврат структуры через аргумент
$ffi = FFI::cdef("
    typedef unsigned int time_t;
    typedef unsigned int suseconds_t;

    struct timeval {
        time_t   tv_sec;
        suseconds_t tv_usec;
    };

    int gettimeofday(struct timeval  *tv, struct timezone  *tz);", "libc.so.6");

    $tv = $ffi->new("struct timeval");
    $tz = $ffi->new("struct timezone");

    var_dump($ffi->gettimeofday(FFI::addr($tv), FFI::addr($tz)));

    var_dump($tv->tv_sec);

    var_dump($tz);
 ?>


<?php //Пример #3 Доступ к существующим переменным C
$x = FFI::new("int");
var_dump($x->cdata);

$x->cdata = 5;
var_dump($x->cdata);

$x->cdata +=2;
var_dump($x->cdata);
 ?>

<?php //Пример #5 Работа с массивами C
$a = FFI::new("long[1024]");

for ($i = 0; $i<count($a); $i++){
    $a[$i]=$i;
}
var_dump($a[25]);
$sum = 0;
foreach ($a as $n){
    $sum +=$n;
}
var_dump($sum);
var_dump(count($a));
var_dump(FFI::sizeof($a));
 ?>


<?php //Пример #6 Работа с перечислениями C
$a = FFI::cdef('typedef enum _zend_ffi_symbol_kind{
    ZEND_FFI_SYM_TYPE,
    ZEND_FFI_SYM_CONST = 2,
    ZEND_FFI_SYM_VAR,
    ZEND_FFI_SYM_FUNC
} zend_ffi_symbol_kind;');
 
 var_dump($a->ZEND_FFI_SYM_TYPE);
 var_dump($a->ZEND_FFI_SYM_CONST);
 var_dump($a->ZEND_FFI_SYM_VAR);
 ?>


<?php //Callback-функции PHP ¶
$zend = FFI::cdef("
typedef int (*zend_write_func_t)(const chsr *str, size_t_str str_lenght);
extern zend_write_func_t zend_write;");

echo "привет, мир ";

$orig_zend_write = clone $zend->zend_write;
$zend->zend_write = function($str, $len){
    global $orig_zend_write;
    $orig_zend_write("{\t", 3);
        $ret = $orig_zend_write($str, $len);
        $orig_zend_write(
        "}", 2);
    return $ret;
};
echo "Привет мир";
$zend->zend_write = $orig_zend_write;
echo "привет, мир";
 ?>


<!-- FFI — Основной интерфейс к коду и данным C
    FFI::addr — Создаёт неуправляемый указатель на данные C
    FFI::alignof — Возвращает величину выравнивания
    FFI::arrayType — Динамически конструирует новый тип С массива
    FFI::cast — Производит преобразование типа C
    FFI::cdef — Создаёт новый объект FFI
    FFI::free — Высвобождает неуправляемую структуру данных
    FFI::isNull — Проверяет, является ли FFI\CData нулевым указателем
    FFI::load — Загрузить декларации C из заголовочного файла
    FFI::memcmp — Сравнивает две области памяти
    FFI::memcpy — Копирует содержимое одной области памяти в другую
    FFI::memset — Заполнить область памяти
    FFI::new — Создаёт структуру данных C
    FFI::scope — Инстанциирует объект FFI в соответствии с декларацией С, разобранной на этапе предзагрузки
    FFI::sizeof — Возвращает размер данных или типа C
    FFI::string — Создаёт строку PHP из области памяти
    FFI::type — Создаёт объект FFI\CType из декларации С
    FFI::typeof — Получает FFI\CType для FFI\CData
FFI\CData — Доступ к данным C
FFI\CType — Доступ к типам C
FFI\Exception — Исключения FFI
FFI\ParserException — Исключения парсера FFI -->



<!-- https://www.php.net/manual/ru/book.ffi.php -->
</body> 
</html>





























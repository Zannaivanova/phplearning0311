<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Опции и информация PHP</title>    
</head>
<body>


        <!-- assert_options — Установка и получение настроек механизма проверки утверждений -->
<?php //Пример #1 Пример использования assert_options()
function function assert_fai;ure($file, $line, $assertion, $message)
{
   echo "проверка $assertion в $file на строке $line провалена: $message";
 } 

function test_assert($parameter){
assert(is_bool($parameter));
}

assert_options(ASSERT_ACTIVE, true);
assert_options(ASSERT_BAIL, true);
assert_options(ASSERT_BAIL, false);
assert_options(ASSERT_CALLBACK, 'assert_failure');

test_assert(1);

echo 'никогда не будет выведено';
 ?>

        <!-- assert — Проверяет, является ли утверждение false -->
<?php  //Пример #1 Обработка неудачных проверок утверждений с использованием собственного обработчика. Традиционная работа функции assert (PHP 5 и 7) 

assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_QUIET_EVAL, 1);

function my_assistant_handler($file, $line, $code){
    echo "<>hr неудачная проверка устверждения: 
    файл '$file'<br/>
    Строка '$line'<br />
    код '$code'<br/></hr>";
}
assert_options(ASSERT_CALLBACK, 'my_assert_hamdler');

assert('mysql_query("")');
?>


<?php //Пример #2 Использование собственного обработчика с выводом описания
assert_options(ASSERT_ACTIVE,1),
assert_options(ASSERT_WARNING, 0),
assert_options(ASSERT_QUIET_EVAL, 1);

function my_assert_handler($file, line, $code, $desc = null){
    echo "неудачная проверка утверждения в $file:$line: $code";
if($desc){
    echo ":$desc";
}

echo "\n";
}

assert_options(ASSERT_CALLBACK, 'my_assert_handler');

assert('2<1');
assert('2<1', 'Два больше, чем один');
 ?>


<?php//Пример #3 Ожидания без собственного исключения.Ожидания (только PHP 7) 
assert(true == false);
echo 'привет'; 
 ?>

 <?php //Пример #4 Ожидания с собственным исключением
 class CustomError extends AssertionError {}

 assert(true == false, new CustomError('True не является false'));
 echo 'привет';
  ?>


        <!-- cli_get_process_title — Возвращает заголовок текущего процесса -->
<?php//Пример #1 Пример использования cli_get_process_title()
echo "заголовок процесса: ".cli_get_process_title(). "\n";
  ?>

        <!-- cli_set_process_title — Устанавливает заголовок процесса -->
        <?php //Пример #1 Пример использования cli_set_process_title()
$title = " мой потрясающий php-скрипт";
$pid = getmypid();

if (!cli_set_process_title($title)){
    echo "не удалось установить заголовок процесса для PID $pid...";
    exit(1);
} else {
    echo "заголовок процесса '$title' для PID $pid был установлен";
    sleep(5);
} ?>


        <!-- dl — Загружает модуль PHP во время выполнения -->
<?php //Пример #1 Примеры использования dl()
if(!extention_;oaded('sqlite')){
    if(strtoupper(substr(PHP_OS, 0, 3))==='WIN'){
        dl('php_sqlite.dll');
    } else {
        dl('sqlite.so');
    }
}

if(!extention_loaded('sq;ite')){
    $prefix = (PHP_SHLIB_SUFFIX === 'dll')? 'php_':'';
    dl($prefix . 'sqlite.' .PHP_SHLIB_SUFFIX);
 }?>


        <!-- extension_loaded — Определяет, загружен ли модуль -->
<?php //Пример #1 Пример использования extension_loaded()
if(!extention_;oaded('gd')){
if (!dl('gd.so')){
    exit;
}
 }?>

        <!-- gc_collect_cycles — Принудительный запуск сборщика мусора -->
        <!-- gc_disable — Отключает сборщик циклических ссылок -->


        <!-- gc_enable — Включает сборщик циклических ссылок -->
<?php //Пример #1 Пример использования gc_enabled()
if(gc_enable()) gc_collect_cycles();
 ?>


        <!-- gc_enabled — Возвращает текущее состояние сборщика циклических ссылок -->

        <!-- gc_mem_caches — Освобождает память, используемую менеджером памяти Zend Engine -->


        <!-- gc_status — Возвращает информацию о текущем статусе сборщика мусора -->
<?php //Пример #1 Использование gc_status()
$a = new stdClass();
$a->b = [];
for ($i = 0; $i<100000; $i++){
    $b = new stdClass();
    $b->a = $a;
    $a->b[] = $b;}

unset($a);
unset($b);
gc_collect_cycles()

var_dump(gt_status());
 ?>

        <!-- get_cfg_var — Извлекает значение настройки конфигурации PHP -->


        <!-- get_current_user — Получает имя владельца текущего скрипта PHP -->
<?php //Пример #1 Пример использования get_current_user()
echo 'текущий владелец скрипта: ' . get_current_user();
 ?>
        

        <!-- get_defined_constants — Возвращает ассоциативный массив с именами всех констант и их значений -->
<?php 
define("MY_CONSTANT", 1);
print_r(get_defined_constants(true));
 ?>

<?php //Пример #1 Пример использования get_defined_constants()
print_r(get_defined_constants)
 ?>
        <!-- get_extension_funcs — Возвращает массив имён функций модуля -->
<?php //Пример #1 Выводит функции XML
print_r(get_extention_funcs("xml"));
 ?>
        <!-- get_include_path — Получение текущего значения настройки конфигурации include_path -->
<?php //Пример #1 Пример использования get_include_path()
echo get_include_path();

echo ini_get('include_path');
 ?>


<?php //Пример #1 Пример использования get_included_files()
include 'tst1.php';
include_once 'test2.php';
require 'test3.php';
require_once 'test4.php';

$included_files = get_included_files();

forech ($included_files as $filename){
    echo "$filename";
 ?>

      <!--   get_included_files — Возвращает массив имён включённых в скрипт файлов -->

        <!-- get_loaded_extensions — Возвращает массив имён всех скомпилированных и загруженных модулей -->
<?php //Пример #1 Пример использования get_loaded_extensions()
print_r(get_loaded_extensions());
 ?>


        <!-- get_magic_quotes_gpc — Получение текущего значения настройки конфигурации magic_quotes_gpc -->
<?php //Пример #1 Пример использования get_magic_quotes_runtime()
if (get_magic_quotes_runtime()){
    set_magic_quotes_runtime(false);
 ?>


        <!-- get_magic_quotes_runtime — Получение текущего значения настройки конфигурации magic_quotes_runtime -->



        <!-- get_required_files — Псевдоним get_included_files -->

        <!-- get_resources — Возвращает активные ресурсы -->
<?php //Пример #1 Пример использования get_resources()
$fp = tmpfile();
var_dump(get_resources());
 ?>

        <!-- getenv — Получение значения переменной окружения -->
<?php //Пример #1 Пример использования getenv()
$ip = getenv('REMOTE_ADDR');

$ip = $_SERVER['REMOTE_ADDR'];

$ip = getenv('REMOTE_ADDR', true)?:getenv('REMOTE_ADDR');
 }
 ?>

        <!-- getlastmod — Получает время последней модификации страницы -->
<?php //Пример #1 Пример использования getlastmod()
echo "Последнее измениние: ". date("F d Y H:i:s.", getlastmod());
 ?>


        <!-- getmygid — Получить GID владельца скрипта PHP -->
        <!-- getmyinode — Получает значение inode текущего скрипта -->
        <!-- getmypid — Получение ID процесса PHP -->
        <!-- getmyuid — Получение UID владельца скрипта PHP -->
        <!-- getopt — Получает параметры из списка аргументов командной строки -->


        <!-- getrusage — Получает информацию об использовании текущего ресурса -->
<?php //Пример #1 Пример использования getrusage()

$dat = getusage();
echo $dat["ru_oublock"];       // количество операций вывода блока
echo $dat["ru_inblock"];       // количество операций приёма блока
echo $dat["ru_msgsnd"];        // количество отправленных сообщений IPC
echo $dat["ru_msgrcv"];        // количество принятых сообщений IPC
echo $dat["ru_maxrss"];        // наибольший размер установленной резидентной памяти
echo $dat["ru_ixrss"];         // суммарное значение размера разделяемой памяти
echo $dat["ru_idrss"];         // суммарное значение размера неразделяемых данных
echo $dat["ru_minflt"];        // количество исправленных страниц (лёгкая ошибка страницы)
echo $dat["ru_majflt"];        // количество ошибочных страниц (тяжёлая ошибка страницы)
echo $dat["ru_nsignals"];      // количество полученных сигналов
echo $dat["ru_nvcsw"];         // количество согласованных переключений контекста
echo $dat["ru_nivcsw"];        // количество несогласованных переключений контекста
echo $dat["ru_nswap"];         // количество свопов
echo $dat["ru_utime.tv_usec"]; // время на задачи пользователя (user time) (микросекунды)
echo $dat["ru_utime.tv_sec"];  // время на задачи пользователя (user time) (секунды)
echo $dat["ru_stime.tv_usec"]; // время на системные задачи (system time) (микросекунды)
 ?>

        <!-- ini_alter — Псевдоним ini_set -->

        <!-- ini_get_all — Получает все настройки конфигурации -->
<?php //Пример #1 Примеры использования ini_get_all()
print_r(ini_get_all("pcre"));
print_r(ini_get_all());
 ?>

        <!-- ini_get — Получает значение настройки конфигурации -->
<?php //Пример #1 Несколько примеров использования ini_get()
echo 'dis[lay_errors = '. ini_get('display_errors').;
echo 'register_globals = '. ini_get('post_max_size').;
echo 'post_max_sixe =  '. ini_get('post_max_size').;
echo 'post_max_size+1 = '.(ini_get('post_max_size')+1). ;
echo 'post_max_size in bytes = '. return_bytes(ini_get('post_max_size'));

function return_bytes($val){
    $val = trim($val);
    $last = strtolower($val[strlen($val)-1]);
    switch($last){
        case 'g':
           $val *=1024;
        case 'm':
           $val *=1024;
        case 'k':
           $val *=1024;
    }
return $val;
 ?>

        <!-- ini_restore — Восстанавливает значение настройки конфигурации -->

<?php //Пример #1 Пример использования ini_restore()
$setting = 'html_errors';

echo 'текущее значение настройки \''. $setting .'\':'.ini_det($setting), PHP_EOL;

ini_set($setting, ini_get($setting)? 0:1);
echo 'новое значение настройки:\' '.$setting . '\': ' .ini_get($setting), PHP_EOL;

ini_restore($setting);
echo 'исходное значение настройки \''. $setting . '\': ', ini_get($setting), PHP_EOL;

 ?>
        <!-- ini_set — Устанавливает значение настройки конфигурации -->
<?php //Пример #1 Установка значения ini-настройки
echo ini_get('display_errors');

if (!ini_get('display_errors')){
ini_set('display_errors', '1');
    }

echo ini_get('display_errors');
 ?>

        <!-- main — Заглушка для main -->
       <!--  memory_get_peak_usage — Возвращает пиковое значение объёма памяти, выделенное PHP -->


        <!-- memory_get_usage — Возвращает количество памяти, выделенное для PHP -->
<?php //Пример #1 Пример использования memory_get_usage()
echo memory_get_usage() . ;

$a= str_repeat("Hello", 4242);

echo memory_get_usage() .

unset($a);

echo memory_get_usage()

 ?>

       <!--  php_ini_loaded_file — Получить путь к загруженному файлу php.ini -->

<?php //Пример #1 Пример использования php_ini_loaded_file()
$inipath = php_ini_loaded_file();

if($inipath){
    echo 'загруженный php.ini: '. $inipath;
 } else {
    echo 'файл php.ini не загружен';
 }

 ?>
      <!--   php_ini_scanned_files — Возвращает список .ini-файлов, найденных в дополнительной ini-директории -->
<?php //Пример #1 Простой пример вывода списка ini-файлов 
if ($filelist = php_ini_scanned_files()){
    if (strlen($filelist)>0){
        $files = explode(',', $filelist);

        fireach ($files as $file){
            echo "<li>".trim($file)."</li>";
        }
    }
}
 ?>


       <!--  php_sapi_name — Возвращает тип интерфейса между веб-сервером и PHP -->

<?php//Пример #1 Пример использования php_sapi_name()
$sapi_type= php_sapi_name();
if (substr($sapi_type, 0, 3) == 'cgi'){
    echo "Вы используете CGI PHP";
} else {
    echo " Вы используете не CGI PHP";
}
        ?>
       

       <!--  php_uname — Возвращает информацию об операционной системе, на которой запущен PHP -->
<?php //Пример #1 Несколько примеров использования php_uname()
echo php_uname();
echo PHP_OS;

IF (strtoupper(substr(PHP_OS, 0, 3))==='WIN'){
echo ' сервер работает под управдением Windows';
} else {
    echo 'сервер работает под управдением ОС, отличным от Windows'; 
}
 ?>


<?php //Пример #2 Некоторые константы OS
echo DIRECTORY_SEPERETOR;
echo PHP_SHLIB_SUFFIX;
echo PATH_SEPARETOR;

echo DIRECTIRY_SEPARATOR;
echo PHP_SHLIB_SUFFIX;
echo PATH_SEPARETOR;
 ?>
        

        <!-- phpcredits — Выводит список разработчиков PHP -->
<?php //Пример #1 Выводит основных разработчиков
phpcredits(CREDITS_GROUP| CREDITS_DOCS | CREDITS_FULLPAGE);
 ?>


        <!-- phpinfo — Выводит информацию о текущей конфигурации PHP -->
<?php //Пример #1 Пример использования phpinfo()

phpinfo();

phpinfo(INFO_MODULES); ?>


        <!-- phpversion — Получает текущую версию PHP -->
<?php //Пример #2 Пример использования PHP_VERSION_ID
if(!defined('PHP_VERSION_ID')){
$version = explode('.', PHP_VERSION);

define('PHP_VERSION_ID', ($version[0]*10000 + $version[1]*100+ $version[2]));
}

if (PHP_VERSION_ID < 50207){
    define('PHP_MAJOR_VERSION', $version[0]);
    define('PHP_MAJOR_VERSION', $version[1]);
    define('PHP_MAJOR_VERSION', $version[2]);
 }?>

        <!-- putenv — Устанавливает значение переменной среды -->
<?php //Пример #1 Установка значения переменной среды
putenv("UNIQID = $uniqid");
 ?>

        <!-- restore_include_path — Восстанавливает изначальное значение настройки конфигурации include_path -->
        
        <!-- set_include_path — Устанавливает значение настройки конфигурации include_path -->
<?php //Пример #1 Пример использования set_include_path()
set_include_path('/usr/lib/pear');

ini_set('include_path', '/usr/lib/pear');
 ?>


        <!-- set_time_limit — Ограничение времени выполнения скрипта -->

       <!--  sys_get_temp_dir — Возвращает путь к директории временных файлов -->
<?php //Пример #1 Пример использования sys_get_temp_dir()
$temp_file = tempnam(sys_get_temp_dir(), 'Tux');

echo $temp_file;
 ?>


        <!-- version_compare — Сравнивает две "стандартизованные" строки с номером версии PHP -->
<?php //Пример #1 Пример использования version_compare()
if (version_compare(PHP_VERSION, '7.0.0') >= 0) {
    echo 'Я использую PHP версии не ниже 7.0.0, моя версия: ' . PHP_VERSION . "\n";
}

if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
    echo 'Я использую PHP версии не ниже 5.3.0, моя версия: ' . PHP_VERSION . "\n";
}

if (version_compare(PHP_VERSION, '5.0.0', '>=')) {
    echo 'Я использую PHP 5.0.0 или выше, моя версия: ' . PHP_VERSION . "\n";
}

if (version_compare(PHP_VERSION, '5.0.0', '<')) {
    echo 'Я до сих пор использую PHP 4, моя версия: ' . PHP_VERSION . "\n";
}
 ?>

        <!-- zend_thread_id — Возвращает уникальный идентификатор текущего потока выполнения -->
<?php //Пример #1 Пример использования zend_thread_id()
$thread_id=zend_thread_id();

echo'идентификатор текущего потока выполнения: '. $thred_id;
 ?>

        <!-- zend_version — Получает версию движка Zend -->
<?php//Пример #1 Пример использования zend_version() 
echo "Версия движка Zend: " . zend_version();
?>




<!-- https://www.php.net/manual/ru/book.info.php -->
</body> 
</html>





























<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Модули для работы с базами данных</title>    
</head>
<body>


    <!-- 
    Уровни абстракции
        DBA — Database (dbm-style) Abstraction Layer
        ODBC — ODBC (Unified)
        PDO — Объекты данных PHP
    Модули для работы с базами данных отдельных производителей
        CUBRID
        dBase
        Firebird/InterBase
        IBM DB2 — IBM DB2, Cloudscape и Apache Derby
        MongoDB — Драйвер MongoDB
        MySQL — MySQL драйверы и плагины
        OCI8 — Oracle OCI8
        PostgreSQL
        SQLite3
        SQLSRV — Драйвер СУБД Microsoft SQL Server для PHP
 -->

<?php //Пример #1 DBA пример
$id = dba_open("/tmp/test.db", "n", "db2");

if(!$id){
    echo "dba_open failed";
    exit;
}

dba_repalce("key", "this is an example", $id);

if (dba_exists("key", $id)){
    echo dba_fetch("key", $id);
    dba_delete("key", $id);
}

dba_close($id);
 ?>


<?php //Пример #2 Обход базы данных
$key = dba_firstkey($id);

while($key !==false){
    if (true){
        $handle_later[]=$key;
    }
    $key = dba_nextkey($id);
}

forech($handle_later as $val){
    dba_deleted($val, $id);
}
 ?>

<?php //Пример #1 Пример использования dba_handlers()
echo" Доступные обработчики DBA";
foreach (dba_handlers(true) as $handler_name =>$handler_version){
    $handler_version = str_replace('$', '', $handler_version);
    echo "-$handler_name: $handler_version";
} ?>

<?php //Пример #1 Перечисление привилегий для столбца
$conn = odbc_connect($dsn, $user, $pass);
$privileges = odbc_columnprivileges($conn, 'TutorialDB', 'dbo', 'test', 'id');
while(($row = odbc_fetch_array($privileges))){
    print_r($row);
    break;
} ?>

<?php //Пример #1 Перечисление столбцов таблицы
$conn = odbc_connect($dsn, $user, $pass);
$columns = odbc_columns($conn, 'TutorialDB', 'dbo', 'test', '%');
while(($row = odbc_fetch_array($columns)){
    print_r($row);
    break;
})
 ?>

<?php //Пример #1 Соединения без DSN
$connection = odbc_connect("Driver ={SQL SERVER Native Client 10.0};Server = $server; Database = $database;", $user, $password);

$connection = odbc_connect("Driver={Microsoft Access Driver (*.mdb)};Dbq=$mdbFilename", $user, $password);

$exelFile = realpath('C:/ExelData.xls');
$exelDir = dirname($exelFile);
$connection = odbc_connect("Driver={Microsoft Excel Driver (*.xls)};DriverId=790;Dbq=$excelFile;DefaultDir=$excelDir" , '', '');
 ?>

<?php //Пример #1 Перечисление доступных DSN
$conn = odbc_connect('dsn', 'user', 'pass');
$dsn_info = odbc_data_source($conn, SQL_FETCH_FIRST);
while($dsn_info){
    print_r($dsn_info);
    $dsn_info = odbc_data_source($conn, SQL_FETCH_NEXT);
} ?>


<?php //Пример #1 Пример использования odbc_execute() и odbc_prepare()
$a = 1;
$b = 2;
$c = 3;
$stmt = odbc_prepare($conn, 'CALL myproc
    (?,?,?)');
$success = odbc_execute($stmt, array ($a, $b, $c));
 ?>


<?php //Пример #1 Примеры использования odbc_fetch_into()
$rc = odbc_fetch_into($res_id, $my_array);
 ?>


<?php//Пример #1 Пример использования odbc_next_result()
$r_Connection = odbc_connect($dsn, $username, $password);

$s_SQL = <<<END_SQL
SELECT 'A'
SELECT 'B'
SELECT 'C'
END_SQL;

$r_Results = odbc_exec($r_Connection, $s_SQL);

$a_Row1 = odbc_fetch_array($r_Results);
$a_Row2 = odbc_fetch_array($r_Results);
echo "Вывод первого результирующего набора ";
var_dump($a_Row1, $a_Row2);

echo "Получение второго результирующего набора ";
var_dump(odbc_next_result($r_Results));

$a_Row1 = odbc_fetch_array($r_Results);
$a_Row2 = odbc_fetch_array($r_Results);
echo "Вывод второго результирующего набора ";
var_dump($a_Row1, $a_Row2);

echo "Получение третьего результирующего набора ";
var_dump(odbc_next_result($r_Results));

$a_Row1 = odbc_fetch_array($r_Results);
$a_Row2 = odbc_fetch_array($r_Results);
echo "Вывод третьего результирующего набора ";
var_dump($a_Row1, $a_Row2);

echo "Попытка получения четвёртого результирующего набора ";
var_dump(odbc_next_result($r_Results));
?>


<?php //Пример #1 Пример использования odbc_execute() и odbc_prepare()
$a = 1;
$b = 2;
$c = 3;
$stmt    = odbc_prepare($conn, 'CALL myproc(?,?,?)');
$success = odbc_execute($stmt, array($a, $b, $c));
?>


<?php //Пример #1 Перечисление первичных ключей столбца
$conn = odbc_connect($dsn, $user, $password);
$primarykeys = odbc_primarykeys($conn, 'TutorialDB', 'dbo', 'TEST');
while(($row = odbc_fetch_array($primarykeys))){
    print_r($row);
    break;
} ?>

<?php //Пример #1 Перечисление столбцов хранимой процедуры
$conn = odbc_connect($dsn, $user, $pass);
$columns = odbc_procedurecolumns($conn, 'TutorialDB', 'dbo', 'GetEmployeeSalesYTD;1', '%');
while(($row = odbc_fetch_array($columns))){
    print_r;
    break;
} ?>


<?php //Пример #1 Примеры использования odbc_setoption()
odbc_setoption($conn, 1, 102, 1);

$resut = odbc_prepare($conn, $sql);
odbc_setoption($result, 2,0, 30);
odbc_execute($result);

 ?>


 <?php //Пример #1 Вывод статистики о таблице
$conn = odbc_connect($dsn, $user, $pass);
$statistics = odbc_ststistics($conn, 'TutorialDB', 'dbo', 'TEST', SQL_INDEX_Unique, SQL_QUICK);
while(($row = odbc_fetch_array($statistics))){
    print_r($row);break;
}

  ?>

<?php //Пример #1 Перечисление привилегий таблицы
$conn = odbc_connect($dsn, $user, $pass);
$privileges = odbc_tableprivileges($conn, 'SalesOrders', 'dbo', 'Orders');
while(($row = odbc_fetch_array($privileges))){
    print_r($row);
    break;
}
 ?>


<?php //Пример #1 Перечисление таблиц в каталоге
$conn = odbc_connect($dsn, $user, $pass);
$tables = odbc_tables($conn, 'SalesOrders', 'dbo', '%', 'TABLE');
while(($row = odbc_fetch_array($tables))){
    print_r($row);
    break;
}

 ?>

<!-- https://www.php.net/manual/ru/refs.database.php -->
 </body> 
   </html>
        
        
        
        
        
        
        
        
        
       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

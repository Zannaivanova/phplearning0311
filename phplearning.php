<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mhash</title>    
</head>
<body>
<?php //Пример #1 Вычисление MD5 и HMAC и печать их в шестнадцатеричном виде
$input = "what do ya want for nothing?";
$hash = mhash(MHASH_MD5, $input);
echo "Хеш Md5 - ". bin2hex($hash) . "<br/>";
$hash = mhash(MHASH_MD5, $input, "Jefe");
echo "Хеш HMAC - ".bin2hex($hash) ."<br>";
 ?>

<?php //Пример #1 Обход всех хешей
$nr = mhash_count();

for($i=0; $i<=$nr; $i++){
    echo sprintf("размер блока хеша %s - %d",
mhash_get_hash_name($i),
mhash_get_block_size($i));
}
?>
<!-- https://www.php.net/manual/ru/mhash.examples.php -->
       </body> 
        </html>
        
        
        
        
        
        
        
        
        
       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

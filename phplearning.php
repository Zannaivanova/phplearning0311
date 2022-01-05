<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hash</title>    
</head>
<body>
<?php //Пример #1 Пример использования hash_copy()
$context = hash_init("md5");
hash_update($context, "data");

$copy_context = hash_copy($context);

echo hash_final($context), "\n";

hash_update($copy_context, "data");
echo hash_final($copy_context),"\n";
 ?>


<?php //Пример #1 Пример использования hash_equals()
$expected = crypt('12345', '$2a$07$usesomesillystringforsalt$');
$correct = crypt('12345', '$2a$07$usesomesillystringforsalt$');
$incorrect = crypt('apple', '$2a$07$usesomesillystringforsalt$');

var_dump(hash_equals($expected, $correct));
var_dump(hash_equals($expected, $incorrect));
 ?>

<?php //Пример #1 Использование hash_file()
file_put_contents('example.txt', 'наглый коричневы лисенок прыгвет вокрун ленивой собаки');

echo hash_file('md5', 'example.txt');
 ?>


<?php //Пример #1 Пример использования hash_final()
$ctx = hash_init('sha1');
hash_update($ctx, 'наглый коричневы лисенок прыгвет вокрун ленивой собаки');
echo hash_final($ctx);
 ?>


<?php //Пример #1 Пример использования hash_hkdf()
$inputKey = random_bytes(32);
$salt = random_bytes(16);

$encryptionKey = hash_hkdf('sha256', $inputKey, 32, 'aes-256-encryption', $salt);
$authenticationKey = hash_hkdf('sha256', $inputKey, 32, 'sha-256-athentication', $salt);

var_dump($encrypionKey !==$authenticationKey);
 ?>

<?php //Пример #1 Пример использования hash_hmac_file()
file_put_contents('example.txt', 'Наглый коричневый лисёнок прыгает вокруг ленивой собаки.');

echo hash_hmac_file('md5', 'example.txt', 'secret');
 ?>

<?php //Пример #1 Пример инкрементального хеширования
$ctx = hash_init('md5');
hash_update($ctx, 'Наглый коричневый лисёнок ');
hash_update($ctx, 'прыгает вокруг ленивой собаки.');
echo hash_final($ctx);
 ?>


<?php //Пример #1 Пример простого использования hash_pbkdf2()
$password = 'password';
$iterations = 1000;

$salt = openssl_random_pseudo_bytes(16);
$hash = hash_pdkdf2("sha256", 4password, $salt, $iteration s, 20);
var_dump($hash);

$hash = hash_pdkdf2("sha256", $password, $salt, $iterations, 10,true);
var_dump(bin2hex($hash));
 ?>

<?php //Пример #1 Пример использования hash_update_stream()
$fp=tmpfile();
fwrite($fp, 'Наглый коричневый лисёнок прыгает вокруг ленивой собаки.');
rewind($fp);

$ctx = hash_init('md5');
hash_update_stream($ctx, $fp);
echo hash_final($ctx);
 ?>

<!-- https://www.php.net/manual/ru/function.hash-copy.php -->
       </body> 
        </html>
        
        
        
        
        
        
        
        
        
       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
